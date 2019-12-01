<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * Testing if registration for Companies works.
     *
     * @return void
     */
    public function testRegisterCompany()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/register')
                    ->type('name', env('DUSK_NEW_NAME'))
                    ->type('email', env('DUSK_NEW_USER'))
                    ->type('verificateEmail', env('DUSK_NEW_USER'))
                    ->type('password', env('DUSK_NEW_PASSWORD'))
                    ->press('.button')
                    ->assertPathIs('/');
        });
    }

    /**
     * Testing if registration for Students works.
     *
     * @return void
     */
    public function testRegisterStudent()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/register')
                    ->click('.slider__container')
                    ->type('firstname', env('DUSK_NEW_FIRSTNAME'))
                    ->type('lastname', env('DUSK_NEW_LASTNAME'))
                    ->type('email', env('DUSK_NEW_USER_STUDENT'))
                    ->type('verificateEmail', env('DUSK_NEW_USER_STUDENT'))
                    ->type('password', env('DUSK_NEW_PASSWORD'))
                    ->press('.button')
                    ->assertPathIs('/');
        });
    }
}
