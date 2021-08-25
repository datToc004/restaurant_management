<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount')->unsigned()->nullable();
            $table->text('note')->nullable();
            $table->integer('reservation_id')->unsigned()->nullable();
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->integer('dish_id')->unsigned()->nullable();
            $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dish_reservation');
    }
}
