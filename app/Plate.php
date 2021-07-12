<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Plate extends Model
{

    protected $fillable=['name','description','visibility','price','image','ingredients'];

    public function restaurant(){
        return $this->belongsTo('App\Restaurant');

    }

    public function orders(){
        return $this->belongsToMany('App\Order');

    }

}

