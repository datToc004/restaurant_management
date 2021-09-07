<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dish;
use App\Models\DishReservation;

class Reservation extends Model
{
    use HasFactory;

    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'dish_reservation');
    }

    public function dishReservations()
    {
        return $this->hasMany(DishReservation::class);
    }
}
