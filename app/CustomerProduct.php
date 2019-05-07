<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerProduct extends Model
{
    public function category(){
        return $this->belongsTo('App\Category', 'main_category_id', 'id');
    }

    public function customers(){
        return $this->belongsTo('App\Customer', 'user_id', 'id');
    }
}
