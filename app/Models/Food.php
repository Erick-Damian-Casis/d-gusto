<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
//    use HasFactory;
    use SoftDeletes;

    protected $table = 'foods';
    protected $fillable=[
        'name',
        'cost',
        'state',
        'special',
    ];

    //relationship
    function orders(){
        return $this->hasMany(Order::class);
    }
}
