<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;
class ScrollbarTest extends DuskTestCase
{

    
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testScrollbar()
    {   
        
      
        $this->browse(function ($browser)    {
            $browser->visit('/')
                    ->scrollToElement('.sbox1')
                    // ->assertSee('Laravel')
                    ;
        });

    }
}
