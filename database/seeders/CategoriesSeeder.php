<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Bàn thường'],
            ['id' => 2, 'name' => 'Bàn vip'],
            ['id' => 3, 'name' => 'Bàn tròn'],
        ]);
    }
}
