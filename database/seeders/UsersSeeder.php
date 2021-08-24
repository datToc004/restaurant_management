<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['id' => 1, 'email' => 'admin@gmail.com', 'username' => 'admin', 'password' => bcrypt('123456'), 'name' => 'vietpro', 'address' => 'Thường tín', 'phone' => '0356653301', 'sex' => 'nam', 'role_id' => 1],
            ['id' => 2, 'email' => 'zimpro@gmail.com', 'username' => 'zimpro', 'password' => bcrypt('123456'), 'name' => 'Nguyễn thế vũ', 'address' => 'Bắc giang', 'phone' => '0356654487', 'sex' => 'nữ', 'role_id' => 2],
            ['id' => 3, 'email' => 'datdo@gmail.com', 'username' => 'datdo', 'password' => bcrypt('123456'), 'name' => 'Nguyễn thế phúc', 'address' => 'Huế', 'phone' => '0352264487', 'sex' => 'nam', 'role_id' => 3],
        ]);
    }
}
