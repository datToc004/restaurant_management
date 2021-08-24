<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->delete();
        DB::table('reservations')->insert([
            ['id' => 1, 'note' => 'Bàn thường', 'subtotal' => 50000, 'table_id' => 1, 'order_id' => 1],
            ['id' => 2, 'note' => 'Bàn thường', 'subtotal' => 50000, 'table_id' => 2, 'order_id' => 1],
            ['id' => 3, 'note' => 'Bàn thường', 'subtotal' => 50000, 'table_id' => 3, 'order_id' => 1],
        ]);
    }
}
