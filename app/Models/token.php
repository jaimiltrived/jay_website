<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class token extends Model
{
    use HasFactory;
    protected $table = 'token';
    protected $fillable = ['email','s_time','token','otp'];
}
