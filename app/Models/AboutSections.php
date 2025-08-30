<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSections extends Model
{
    use HasFactory;  protected $fillable = ['title', 'description', 'service_list'];
    protected $table = 'about_sections';
    protected $casts = [
        'service_list' => 'array'
    ];
}
