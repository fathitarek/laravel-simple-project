<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Auth;
class CartController extends Controller
{
    public function addToCart($product_id){
    Cart::create(['product_id'=>$product_id,"qty"=>1,'customer_id'=>Auth::guard('customer')->user()->id]);
    return redirect()->back(); 
    }

    public function getCartByUser(){
        $total=0;
       $products= Cart::with(['product'])->where('customer_id',Auth::guard('customer')->user()->id)->get();
        foreach ($products as $product){
           $total+= $product->qty * $product->product->after_price;
        }
    //    return $products;
        return   view('front.carts')->with('products',$products)->with('total',$total);
    }

    public function deleteFromCart($id){
        Cart::where('id',$id)->delete();
        return redirect()->back(); 
    }

    public function updateQty($id,$qty){
    $cart=  Cart::where('id',$id)->update(["qty"=>$qty]);
    return Cart::find($id);
    }
}
