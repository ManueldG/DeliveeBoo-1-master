<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $fillable = ['user_id','name', 'description', 'image', 'address', 'city', 'cap', 'phone_number'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function plates(){
        return $this->hasMany('App\Plate');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function cuisines(){
        return $this->belongsToMany('App\Cuisine');

    }

}

