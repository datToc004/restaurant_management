<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\CreateCategoryPage;
use Tests\DuskTestCase;

class CreateCategoryTest extends DuskTestCase
{
    public function testCreateCategorySuccessfully()
    {
        $name = "bàn có góc";
        $this->browse(function (Browser $browser) use ($name) {
            $browser->loginAs(User::find(3))
                ->visit(new CreateCategoryPage())
                ->create($name)
                ->assertPathIs('/manager/categories');
        });
    }

    public function testCreateCategoryFailed()
    {
        $name = "";
        $this->browse(function (Browser $browser) use ($name) {
            $browser->loginAs(User::find(3))
                ->visit(new CreateCategoryPage())
                ->create($name)
                ->assertSee("Name cannot be blank")
                ->assertPathIs('/manager/categories/create');
        });
    }
}
