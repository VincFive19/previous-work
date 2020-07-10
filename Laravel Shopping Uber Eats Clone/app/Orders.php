<?php

namespace App;
use App\Dish;
use App\User;


use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $fillable = ['dish_Id', 'user_Id', 'date'];

    // function user() { 
    //     return $this->belongsTo('App\User', 'id', 'user_id'); 
    // }
    // function dish() {
    //     return $this->hasMany('App\Dish', 'id', 'dish_id');
    // } 
    function user() { 
        return $this->hasMany('App\User', 'id', 'user_Id'); 
    }
    function dish() {
        return $this->hasMany('App\Dish', 'id', 'dish_Id');
    }
}
