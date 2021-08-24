<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dish_reservation')->delete();
        DB::table('dish_reservation')->insert([
            ['id' => 1, 'amount' => 1, 'note' => 'cơm trứng', 'reservation_id' => 1, 'dish_id' => 1],
            ['id' => 2, 'amount' => 2, 'note' => 'cơm gà', 'reservation_id' => 2, 'dish_id' => 1],
            ['id' => 3, 'amount' => 1, 'note' => 'cơm canh', 'reservation_id' => 3, 'dish_id' => 1],
        ]);
    }
}
