<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;
class ReportTest extends DuskTestCase
{
    use DatabaseMigrations;
// something wrong in 'our article'
    /**
      * A basic browser test example.
      *
      * @return void
      */
     public function testReportToAdd()
     {
        
         $this->browse(function (Browser $browser)  {
             $browser->visit('/')
                 ->clickLink('articles')
                 ->assertSee('our article')
                 ->clickLink('select1')
                 ->assertSee('Report abuse')
                 ->value('#name', 'my name1')
                 ->value('#email', 'ttt@gmail.com')
                 ->value('#reason', 'okokokyyyyy')
                 // ->press('Submit')
                 ->click('button[type="submit"]')
                 
//                 ->pause(3000)
                //   ->waitForText('our article')
                //   ->value('Report abuse')
                ->assertSee('our article')
                 // ->assertSee('Report abuse')
                 ;
             
         });
     }
 
}
