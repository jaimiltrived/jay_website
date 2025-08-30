<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
