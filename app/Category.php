<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable=array('name');
    public function products(){
        return $this->hasMany('App\Product');
    }
}
