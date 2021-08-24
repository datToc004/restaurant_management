<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dishes')->delete();
        DB::table('dishes')->insert([
            ['id' => 1, 'code' => 'MA1', 'name' => 'cơm trứng', 'type' => 'châu á', 'price' => 500000, 'description' => 'ngon', 'img' => 'no-img.jpg'],
            ['id' => 2, 'code' => 'MA2', 'name' => 'cơm gà', 'type' => 'châu á', 'price' => 500000, 'description' => 'ngon', 'img' => 'no-img.jpg'],
            ['id' => 3, 'code' => 'MA3', 'name' => 'cơm canh', 'type' => 'châu á', 'price' => 500000, 'description' => 'ngon', 'img' => 'no-img.jpg'],
        ]);
    }
}
