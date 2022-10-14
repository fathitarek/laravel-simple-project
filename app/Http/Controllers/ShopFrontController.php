<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\ProductsImages;
use App\ProductsColor;
use App\colors;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Paginator;
class ShopFrontController extends Controller
{
    public function index($id){

      $products=  Product::with(['images'])->where('category_id',$id)->paginate(2);
    //   return $products; 
    $colors=colors::get();
    foreach ($colors as $key => $color) {
     $color->count= ProductsColor::where('color_id',$color->id)->count();
    }
    return   view('front.shop')->with('products',$products)->with('colors',$colors);
    }

    public function detail($id){

              $product=  Product::with(['images','colors'])->find($id);
            //   return $product;
 return view('front.detail')->with('product',$product);
    }
    public function search(){
      $products= ProductsColor::with(["product",'product.images'])->whereIn('color_id',$_GET['colors_id'])->get();
      $x=array();       
      foreach ($products as $key => $value) {
        array_push($x,$value->product); 
      }
        $data = $this->paginate($x,2);

      $colors=colors::get();
      foreach ($colors as $key => $color) {
      $color->count= ProductsColor::where('color_id',$color->id)->count();
      }
      
      return   view('front.shop')->with('products',$data)->with('colors',$colors);
    }

  public function paginate($items, $perPage = 5, $page = null, $options = ['path'=>'/search']){
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
  }


    
}
