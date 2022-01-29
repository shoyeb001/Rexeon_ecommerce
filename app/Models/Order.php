<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      'status'
  ];

      public function user(){
    	return $this->belongsTo(User::class,'user_id','id');
      }

      public function Pickupcenter(){
        return $this->belongsTo(Pickupcenter::class,'pickup_center','id');
      }



}
