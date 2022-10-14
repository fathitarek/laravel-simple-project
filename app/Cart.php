<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
      public $fillable=array('customer_id','product_id','qty');

       public function product(){
        return $this->belongsTo('App\Product');
    }

}
