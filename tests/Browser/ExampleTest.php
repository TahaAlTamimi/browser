<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    use DatabaseMigrations;
    
  /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }



    // /**
    //  * A basic browser test example.
    //  *
    //  * @return void
    //  */
    // public function testBasicExample()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/')
    //                 ->clickLink('Register')
    //                 ->assertSee('Register')
    //                 ->value('#name','taha')
    //                 ->value('#email','8tttt8@gmail.com')
    //                 ->value('#password','123456789')
    //                 ->value('#password-confirm','123456789')
    //                 ->click('button[type="submit"]')
    //                 ->assertPathIs('/')
    //                 ->assertSee("Laravel")
    //                 ;
    //     });
    // }



    


    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testAddArticle()
    {
        $user = factory(User::class)->create([
            'email' => 'taylor@laravel.com',
        ]);
        $this->browse(function (Browser $browser)  use ($user) {
            $browser->loginAs(User::find(1))
                     ->visit('/creat')
                    // ->clickLink('add article')
                    // ->assertSee('Login')
                    // ->type('email', $user->email)
                    // ->type('password', 'password')
                    // ->press('Login')
                    // ->pause(1000)
                    ->assertPathIs('/creat')
                    ->value('#title', 'select55with pause')
                    ->type('#expert', 'select1')
                    ->type('#body', 'select1')
                    ->resize(1080, 1080)
                    ->select('tags[]','1')
                    ->select('tags[]','2')
                    ->click('button[type="submit"]')
                    
                    ->assertPathIs('/article')

                    ->maximize()
                     ;

        });
    }

    
 

}
