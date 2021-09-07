<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishReservation extends Model
{
    use HasFactory;

    protected $table = "dish_reservation";

    public function dish()
    {
        return $this->belongsTo(Dish::class); 
    }
}
