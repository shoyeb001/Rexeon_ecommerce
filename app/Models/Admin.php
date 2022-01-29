<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'email_verified_at',
        'password',
        'type',
        'categories',
        'brands',
        'sliders',
        'products',
        'stocks',
        'orders',
        'settings',
        'manage_admins',
        'remember_token',
        'profile_photo_path',
        'created_at',
        'updated_at'
    ];
}
