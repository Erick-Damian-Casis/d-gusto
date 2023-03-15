<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Order extends Authenticatable
{
    use SoftDeletes, HasApiTokens, HasFactory;

    protected $table='orders';
    protected $fillable=[
        'spec',
        'amount',
        'order_at'
    ];

    function food(){
        return $this->belongsTo(Food::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }

}
