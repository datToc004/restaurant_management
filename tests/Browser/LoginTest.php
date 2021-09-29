<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\LoginPage;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function testLoginFailed()
    {
        $email = "user@gmail.com";
        $password = "vdfghbdfg";

        $this->browse(function (Browser $browser) use ($email, $password) {
            $browser->visit(new LoginPage())
                ->signIn($email, $password)
                ->assertPathIs('/login')
                ->back();
        });
    }

    public function testLoginButtonClick()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage())
                ->press('li:first-child a')
                ->assertPathIs('/login')
                ->back();
        });
    }

    public function testRegisterButtonClick()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage())
                ->click('a[href="' . route('register') . '"]')
                ->assertPathIs('/registration')
                ->back();
        });
    }

    public function testLogoButtonClick()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage())
                ->press('.navbar-brand')
                ->assertPathIs('/login')
                ->back();
        });
    }

    public function testLoginSuccessfully()
    {
        $email = "admin@gmail.com";
        $password = "123456";

        $this->browse(function (Browser $browser) use ($email, $password) {
            $browser->visit(new LoginPage())
                ->signIn($email, $password)
                ->assertAuthenticated()
                ->assertPathIs('/home');
        });
    }
}
