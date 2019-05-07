<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function sub_category(){
        return $this->hasMany('App\SubCategory');
    }

    public function product(){
        return $this->hasMany('App\Product');
    }

    public function customer()
    {
        return $this->hasMany('App\CustomerProduct');
    }
}
