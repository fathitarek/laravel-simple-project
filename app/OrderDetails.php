<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $fillable=array("order_number","product_id","qty","price");
}
