<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'fabric_type',
        'collection',
        'description',
        'composition',
        'width',
        'weight',
        'price_per_meter',
        'lead_time_days',
    ];

    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
