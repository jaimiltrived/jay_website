<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class registration extends Authenticatable
{
    use Notifiable;

    protected $table = "registration";

    protected $fillable = [
        'u_name',
        'u_lname',
        'u_mail',
        'u_password',
        'u_conformpassword',
        'role',
        'address',
        'profile_picture'
    ];

    protected $hidden = [
        'u_password',
        'u_conformpassword',
        'remember_token',
    ];

    public $timestamps = false; // Add this if your table doesn't have created_at / updated_at
}
