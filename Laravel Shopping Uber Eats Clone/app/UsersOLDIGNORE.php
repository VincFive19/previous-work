<?php

namespace App;
use App\Dish;
use App\Users;


use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $fillable = [ 'name', 'email', 'password', 'address', 'restaurant'];

    function dishes() { 
        return $this->hasMany('App\Product'); 
    }

}
