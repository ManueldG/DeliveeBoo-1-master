<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function plates(){
        return $this->belongsToMany('App\Plate');
        
    }

    public function restaurant(){
        return $this->belongsTo('App\Restaurant');
        
    }
}
