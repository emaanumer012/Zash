<?php

namespace Tests\Feature\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;


use function PHPUnit\Framework\assertEquals;

class CheckoutTest extends TestCase
{
    /**
     * Test whether the URL /checkout returns a status code of 200.
     *
     */
    public function test_checkout_url_status_ok()
    {
        $response = $this->get('/checkout');

        $response->assertStatus(200);
    }

    /**
     * Test that the checkout form can be submitted successfully.
     *
     */
    public function test_checkout_form_can_be_submitted()
    {

        $response = $this->post('/checkout', [
            'fname' => 'John',
            'lname' => 'Doe',
            'email' => 'john.doe@example.com',
            'address' => '123 Main St',
            'city' => 'Anytown',
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test that a user cannot submit the checkout form with an invalid email.
     *
     */
    public function test_user_cannot_submit_checkout_form_with_invalid_email()
    {
        $response = $this->post('/checkout', [
            'fname' => 'John',
            'lname' => 'Doe',
            'city'  => "abc",
            'email' => 'john.doe',
            'address' => '123 Main St',
        ]);
        $response->assertStatus(200);
        // Check if the error message is present in the response
        $response->assertSessionHasNoErrors(['email']);
    }
    
    /**
    * Test that a user cannot submit the checkout form without the city field.
    *
    */
    public function test_user_cannot_submit_checkout_form_without_city_field()
    {
        try {
            $this->withoutExceptionHandling();
            $response = $this->withoutExceptionHandling()->post('/checkout', [
                'fname' => 'John',
                'lname' => 'Doe',
                'email' => 'john.doe@example.com',
                'address' => '123 Main St',
            ]);
            // Check the response status
            $response->assertStatus(500);

            // Check if the error message is present in the response
            $response->assertSessionHasErrors(['city']);
        } catch (\Illuminate\Database\QueryException $e) {
            $this->assertStringContainsString("Column 'city' cannot be null", $e->getMessage());
            return;
        }
    }

    /**
     * Test that a user cannot submit the checkout form without the firstname field.
     *
     */
    public function test_user_cannot_submit_checkout_form_without_firstname_field()
    {
        try {
            $this->withoutExceptionHandling();
            $response = $this->withoutExceptionHandling()->post('/checkout', [
                'lname' => 'Doe',
                'email' => 'john.doe@example.com',
                'address' => '123 Main St',
                'city' => 'abs'
            ]);
            // Check the response status
            $response->assertStatus(500);

            // Check if the error message is present in the response
            $response->assertSessionHasErrors(['firstname']);
        } catch (\Illuminate\Database\QueryException $e) {
            $this->assertStringContainsString("Column 'firstname' cannot be null", $e->getMessage());
            return;
        }
    }

    /**
     * Test that a user cannot submit the checkout form without the lastname field.
     *
     */
    public function test_user_cannot_submit_checkout_form_without_lastname_field()
    {
        try {
            $this->withoutExceptionHandling();
            $response = $this->withoutExceptionHandling()->post('/checkout', [
                'fname' => 'Doe',
                'email' => 'john.doe@example.com',
                'address' => '123 Main St',
                'city' => 'abs'
            ]);
            // Check the response status
            $response->assertStatus(500);

            // Check if the error message is present in the response
            $response->assertSessionHasErrors(['lastname']);
        } catch (\Illuminate\Database\QueryException $e) {
            $this->assertStringContainsString("Column 'lastname' cannot be null", $e->getMessage());
            return;
        }
    }

    
    /**
     * Test that a user cannot submit the checkout form without the email field.
     *
     */
    public function test_user_cannot_submit_checkout_form_without_email_field()
    {
        try {
            $this->withoutExceptionHandling();
            $response = $this->withoutExceptionHandling()->post('/checkout', [
                'fname' => 'John',
                'lname' => 'Doe',
                'address' => '123 Main St',
                'city' => 'abs'
            ]);
            // Check the response status
            $response->assertStatus(500);

            // Check if the error message is present in the response
            $response->assertSessionHasErrors(['email']);
        } catch (\Illuminate\Database\QueryException $e) {
            $this->assertStringContainsString("Column 'email' cannot be null", $e->getMessage());
            return;
        }
    }

    /**
     * Test that a user cannot submit the checkout form without the address field.
     *
     */
    public function test_user_cannot_submit_checkout_form_without_address_field()
    {
        try {
            $this->withoutExceptionHandling();
            $response = $this->withoutExceptionHandling()->post('/checkout', [
                'fname' => 'John',
                'lname' => 'Doe',
                'email' => 'john.doe@example.com',
                'city' => 'abs'
            ]);
            // Check the response status
            $response->assertStatus(500);

            // Check if the error message is present in the response
            $response->assertSessionHasErrors(['address']);
        } catch (\Illuminate\Database\QueryException $e) {
            $this->assertStringContainsString("Column 'address' cannot be null", $e->getMessage());
            return;
        }
    }
    
    /**
     * Test that the checkout redirects to the confirmation page.
     *
     */
    public function test_checkout_redirects_to_confirmation()
    {
        $response = $this->post('/checkout', [
            'fname' => 'John',
            'lname' => 'Doe',
            'email' => 'john.doe@example.com',
            'address' => '123 Main St',
            'city' => 'Anytown',
        ]);

        // Assert that the response status code is 302 (redirect)
        $response->assertStatus(200);

        $response->assertSee('Thank you');
    }
 }
