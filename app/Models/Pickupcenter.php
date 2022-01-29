<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickupcenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'name',
        'phone',
    ];
}
