<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    
    protected $table = 'details'; // Ensure this matches your database table name

    // Add any fillable fields, if necessary
    protected $fillable = ['category', 'other_columns'];
}
