<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'product_name',
        'capacity',
        'type',
        'new_price',
        'occupancy_status',
        'discription',
        'product_image',
    ];

    protected $casts = [
        'product_image' => 'array',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
