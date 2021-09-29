<?php

namespace Tests\Browser\Pages;

use App\Models\User;
use Laravel\Dusk\Browser;

class CreateCategoryPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/manager/categories/create';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  \Laravel\Dusk\Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->loginAs(User::find(3))
            ->visit($this->url())
            ->assertPresent('input[name="name"]');
    }

    public function elements()
    {
        return [
            '@name' => 'input[name="name"]',
            '@submit' => 'button[type=submit]',
        ];
    }

    public function create(Browser $browser, $name)
    {
        $browser->type('@name', $name)
            ->press('@submit');
    }
}
