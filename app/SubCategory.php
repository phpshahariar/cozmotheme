<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function main_category(){
        return $this->belongsTo('App\Category','main_category_id', 'id');
    }

    public function product(){
        return $this->belongsTo('App\Product', 'sub_category_id', 'id');
    }
}
