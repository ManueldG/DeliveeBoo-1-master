<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Plate extends Model
{

    protected $fillable=['restaurant_id','name','description','visibility','price','image'];

    public function restaurant(){
        return $this->belongsTo('App\Restaurant');

    }

    public function orders(){
        return $this->belongsToMany('App\Order');

    }

}

