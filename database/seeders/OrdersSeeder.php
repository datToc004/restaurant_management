<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->delete();
        DB::table('orders')->insert([
            ['id' => 1, 'note' => 'bình thường', 'total' => 15000, 'time_start' => '2021-08-13 08:00:00', 'time_end' => '2021-08-13 10:00:00', 'status' => 0, 'user_id' => 1],
        ]);
    }
}
