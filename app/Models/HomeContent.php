<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    use HasFactory;
    protected $table = 'hotel_contents';

    protected $fillable = [
        'section_title',
        'hotel_name',
        'description',
        'main_image',
        'side_image',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}