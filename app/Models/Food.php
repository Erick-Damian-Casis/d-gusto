<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Food extends Authenticatable
{
//    use HasFactory;
    use HasApiTokens, SoftDeletes, HasFactory;

    protected $table = 'foods';
    protected $fillable=[
        'name',
        'cost',
        'state',
        'special',
        'image',
    ];

    //relationship
    function orders(){
        return $this->hasMany(Order::class);
    }

    function users(){
        return $this->belongsTo(User::class);
    }
}
