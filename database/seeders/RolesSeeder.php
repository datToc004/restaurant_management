<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'khách hàng', 'description' => 'tốt'],
            ['id' => 2, 'name' => 'quản lí', 'description' => 2, 'description' => 'tốt'],
            ['id' => 3, 'name' => 'khách hàng', 'description' => 3, 'description' => 'tốt'],
        ]);
    }
}
