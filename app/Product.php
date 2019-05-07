<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo('App\Category', 'main_category_id', 'id');
    }

    public function sub_category(){
        return $this->belongsTo('App\SubCategory', 'sub_category_id', 'id');
    }

    public function productcustomer(){
        return $this->belongsTo('App\Customer');
    }
}
