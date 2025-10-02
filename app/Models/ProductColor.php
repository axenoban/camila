<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'hex_code',
        'image_url',
        'available_rolls',
        'available_meters',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
