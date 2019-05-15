<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function customers(){
        return $this->belongsTo('App\Customer', 'user_id', 'id');
    }
}
