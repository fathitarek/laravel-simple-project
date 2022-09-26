<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsColor extends Model
{

    public $table="products_color";
    
 public $fillable=array('product_id','color_id');


    public function color(){
        return $this->belongsTo('App\Colors');
    }
}
