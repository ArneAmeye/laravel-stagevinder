<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class StudentTest extends DuskTestCase
{
    /**
     * Testing if student page is available withou login or registartion.
     *
     * @return void
     */
    public function testStudentpageNoAuth()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/students/1')
                    ->assertPresent('.navigation__container');
        });
    }
}
