<?php

namespace Tests\Browser;

use App\Models\User;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogInTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A basic browser test example.
     */

    public function testLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
            ->type('email', 'aahmed.bese20seecs@seecs.edu.pk')
            ->type('password', '7a6882040cdd76b8b559b9f167677270')
            ->press('Login')
            ->assertAuthenticated(); // Verify that the user is authenticated
        });
    }
}
