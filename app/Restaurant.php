<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable=['name','description','visibility','price','image','ingredients'];

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

