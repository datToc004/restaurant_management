<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class LoginPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/login';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  \Laravel\Dusk\Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->visit($this->url())
            ->assertSee('Login')
            ->assertPresent('input[name="email"]')
            ->assertPresent('input[name="password"]')
            ->assertPresent('button[type=submit]');
    }

    public function elements()
    {
        return [
            '@email' => 'input[name="email"]',
            '@password' => 'input[name="password"]',
            '@submit' => 'button[type=submit]',
        ];
    }

    public function signIn(Browser $browser, $email, $password)
    {
        $browser->type('@email', $email)
            ->type('@password', $password)
            ->press('@submit');
    }
}
