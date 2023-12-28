<?php

namespace Tests\Feature\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Admin;

class LoginTest extends TestCase
{
    /**
     * Test whether the login URL returns a status code of 200.
     *
     */
    public function test_login_url_status_ok()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * Test that an admin is able to login successfully.
     *
     */
    public function test_admin_is_able_to_login()
    {
        $response = $this->post('/login', [
            'email' => 'ajaved.bese21seecs@seecs.edu.pk',
            'password' => 'abubakar1243',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/adminHomePage');
    }

    /**
     * Test that an admin cannot login with an invalid email.
     *
     */
    public function test_admin_cannot_login_with_invalid_email()
    {
        $response = $this->post('/login', [
            'email' => 'umair',
            'password' => '123',
        ]);

        $response->assertSessionHasErrors();
    }

    /**
     * Test that an admin cannot login with an invalid password.
     *
     */
    public function test_admin_cannot_login_with_invalid_password()
    {
        $response = $this->post('/login', [
            'email' => 'ajaved.bese21seecs@seecs.edu.pk',
            'password' => '123422312',
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test that an admin cannot login with both invalid username and password.
     *
     */
    public function test_admin_cannot_login_with_invalid_username_and_password()
    {
        $response = $this->post('/login', [
            'email' => 'umair',
            'password' => '1234898',
        ]);

        $response->assertSessionHasErrors();
    }

    /**
     * Test that an admin cannot login with an empty email.
     *

     */
    public function test_admin_cannot_login_with_empty_email()
    {
        $response = $this->post('/login', [
            'password' => '1234898',
        ]);

        $response->assertSessionHasErrors();
    }

    /**
     * Test that an admin cannot login with an empty password.
     *
     */
    public function test_admin_cannot_login_with_empty_password()
    {
        $response = $this->post('/login', [
            'email' => 'umair',
        ]);

        $response->assertSessionHasErrors();
    }

    /**
     * Test that an admin cannot login with both empty email and password.
     *
     */
    public function test_admin_cannot_login_with_empty_email_and_password()
    {
        $response = $this->post('/login', []);

        $response->assertSessionHasErrors();
    }
}
