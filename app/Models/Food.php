<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Food extends Authenticatable
{
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

    // Casting
    public function setImageAttribute($value)
    {
        return $this->attributes['image'] = "http://127.0.0.1:8000".$value;
    }

    public function setCostAttribute($value)
    {
        return $this->attributes['cost'] = round($value, 2);
    }
}
