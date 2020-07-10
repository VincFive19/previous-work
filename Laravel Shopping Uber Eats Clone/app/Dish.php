<?php

namespace App;
use App\Dish;
use App\User;
use App\Order;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    //
    protected $fillable = ['name', 'price', 'user_id', 'image'];

    function user() { 
        return $this->belongsTo('App\User'); 
    }

    function orders() { 
        return $this->belongsToMany('App\Orders', 'dish_Id'); 
    }

}
