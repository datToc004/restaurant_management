<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;
use App\Models\Table;

class Order extends Model
{
    use HasFactory;

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function receipts()
    {
        return $this->hasOne(Receipt::class);
    }

    public function tables()
    {
        return $this->belongsToMany(Table::class, 'reservations');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
