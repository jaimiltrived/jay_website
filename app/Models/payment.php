<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id',
        'order_id',
        'amount',
        'payment_status',
        'user_id',
        'room_id',
        'email',
    ];
}
