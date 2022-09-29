<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        public $fillable=array('name','category_id',"before_price","after_price","description");

    public function category(){
        return $this->belongsTo('App\Category');
    }

       public function images(){
        return $this->hasMany('App\ProductsImages');
    }

       public function colors(){
        return $this->hasMany('App\ProductsColor');
    }
}
