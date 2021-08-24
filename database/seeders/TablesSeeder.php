<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->delete();
        DB::table('tables')->insert([
            ['id' => 1, 'code' => 'BA1', 'name' => 'bàn 1', 'description' => 'ngon', 'status' => 1, 'max' => 5, 'img' => 'no-img.jpg', 'category_id' => 1],
            ['id' => 2, 'code' => 'BA2', 'name' => 'bàn 2', 'description' => 'ngon', 'status' => 1, 'max' => 5, 'img' => 'no-img.jpg', 'category_id' => 2],
            ['id' => 3, 'code' => 'BA3', 'name' => 'bàn 3', 'description' => 'ngon', 'status' => 1, 'max' => 5, 'img' => 'no-img.jpg', 'category_id' => 3],
        ]);
    }
}
