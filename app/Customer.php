<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function customerProduct(){
        return $this->belongsTo('App\CustomerProduct', 'user_id', 'id');
    }

    public function orders(){
        return $this->hasMany(OrderProduct::class);
    }
}
