<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    public $fillable = [
        'product_id',
        'user_id',
        'review',
        'rating',
        'approved',
        'email'
    ];

    protected $casts = [
        'rating' => 'integer',
        'created_at' => 'datetime',
        'approved' => 'boolean',
    ];

    // Relationship to Product/Room
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
