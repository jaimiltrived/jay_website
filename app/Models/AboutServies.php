<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutServies extends Model
{
    use HasFactory;
    protected $table = 'about_services';
    protected $fillable = ['title', 'image'];
}
