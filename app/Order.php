<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['restaurant_id', 'customer_name', 'customer_last_name', 'customer_email', 'customer_phone', 'customer_address', 'date', 'scheduled_delivery', 'tot' ];

    public function plates(){
        return $this->belongsToMany('App\Plate');
        
    }

    public function restaurant(){
        return $this->belongsTo('App\Restaurant');
        
    }
}
