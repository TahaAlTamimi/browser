<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;
class LoginTest extends DuskTestCase


{
    
    use DatabaseMigrations;

/**
     * A basic browser test example.
     *
     * @return void
     */
    public function testLogins()
    {
        $user = factory(User::class)->create([
            'email' => 'taylor@laravel.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'pass')
                ->press('Login')
                ->assertSee("These credentials do not match our records.");
        });}

  


}
