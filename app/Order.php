<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable=array('first_name','last_name','customer_id','email',"address","country","city","state","zip_code","mobile","total",'order_number');

}

