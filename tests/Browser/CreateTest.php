<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class CreateTest extends DuskTestCase
{

    use DatabaseMigrations;
   /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testNotAddArticle()
    {
        // $user = factory(User::class)->create([
        //     'email' => 'taylor@laravel.com',
        // ]);
        // $this->browse(function (Browser $browser)  use($user) {
        //     $browser->visit('/')
        //         ->clickLink('add article')
        //         ->assertSee('Login')
        //         // ->assertPathIs('/login')
        //         ->type('email', $user->email)
        //         ->type('password', 'password')
        //         ->press('Login')
        //         ->pause(1000)
        //         ->assertPathIs('/creat')
        //         ->value('#title', 'ooooo')
        //         ->type('#expert', 'select1')
        //         ->type('#body', '')
        //         ->select('tags[]', '1')
        //         ->select('tags[]', '2')
        //         ->click('button[type="submit"]')
        //         ->assertSee('A message is required')

        //     ;



            $user = factory(User::class)->create([
                'email' => 'taylor@laravel.com',
            ]);
            $this->browse(function (Browser $browser)  use ($user) {
                $browser
                        ->loginAs(User::find(1))
                        ->visit('/')
                        ->clickLink('add article')
                        // ->assertSee('Login')
                        // ->type('email', $user->email)
                        // ->type('password', 'password')
                        // ->press('Login')
                        // ->pause(1000)
                        ->assertPathIs('/creat')
                        ->value('#title', 'select55with pause')
                        ->type('#expert', 'selectdfdfd1')
                        ->type('#body', '')
                        
                        ->select('tags[]','1')
                        ->select('tags[]','2')
                        ->click('button[type="submit"]')
                    //    ->assertSee('A message is required')
                        ->waitForText('A message is required')
                         ;
    
           
        });
    }
}
