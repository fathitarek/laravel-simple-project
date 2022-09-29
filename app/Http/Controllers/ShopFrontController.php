<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\ProductsImages;

use Illuminate\Http\Request;

class ShopFrontController extends Controller
{
    public function index($id){

      $products=  Product::with(['images'])->where('category_id',$id)->get();
    //   return $products; 
    return   view('front.shop')->with('products',$products);
    }

    public function detail($id){

              $product=  Product::with(['images','colors'])->find($id);
            //   return $product;
 return view('front.detail')->with('product',$product);
    }
}
