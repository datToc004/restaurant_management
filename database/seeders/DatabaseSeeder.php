<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(DishesSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(TablesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(OrdersSeeder::class);
        $this->call(ReservationsSeeder::class);
        $this->call(ReceiptsSeeder::class);
        $this->call(CommentsSeeder::class);
        $this->call(DishReservationSeeder::class);
    }
}
