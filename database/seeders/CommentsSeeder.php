<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();
        DB::table('comments')->insert([
            ['id' => 1, 'note' => 'Bàn thường', 'user_id' => 1, 'dish_id' => 1],
            ['id' => 2, 'note' => 'Bàn thường', 'user_id' => 2, 'dish_id' => 2],
            ['id' => 3, 'note' => 'Bàn thường', 'user_id' => 3, 'dish_id' => 3],
        ]);
    }
}
