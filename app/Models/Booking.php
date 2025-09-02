<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Razorpay\Api\Product;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'phone',
        'checkin',
        'checkout',
        'nights',
        'total',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function room()
    {
        return $this->belongsTo(Product::class, 'room_id'); 
    }
}
