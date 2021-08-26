<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\Order;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'max',
        'img',
        'category_id',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'reservations');
    }
}
