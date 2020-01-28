<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class javaScriptTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testJavaScript()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('JavaScript Alert')
                    ->press('Try it')
                    ->assertDialogOpened('I am an alert box!')
                    ->acceptDialog()
                    // ->dismissDialog()
                    ;
        });
    }
}
