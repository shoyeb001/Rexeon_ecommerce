<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_one',
		'phone_two',
		'email',
		'company_name',
		'company_address',
		'facebook',
		'twitter',
		'linkedin',
		'youtube'
    ];
}
