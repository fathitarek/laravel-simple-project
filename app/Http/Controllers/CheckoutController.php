<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Order;
use App\OrderDetails;
use Auth;

class CheckoutController extends Controller
{
        public function getCartByUser(){
        $total=0;
       $products= Cart::with(['product'])->where('customer_id',Auth::guard('customer')->user()->id)->get();
        foreach ($products as $product){
           $total+= $product->qty * $product->product->after_price;
        }
    //    return $total;
        return   view('front.checkout')->with('products',$products)->with('total',$total);
    }


    public function order(Request $request){
        $data = request()->all();
        $data['order_number'] = rand(10,100000);
        $data['customer_id'] = Auth::guard('customer')->user()->id;
       
        
        Order::create($data);
       $products= Cart::with(['product'])->where('customer_id',Auth::guard('customer')->user()->id)->get();
        foreach ($products as $key => $product) {
            OrderDetails::create(['order_number'=>$data['order_number'],'product_id'=>$product->product_id,'qty'=>$product->qty,'price'=>$product->product->after_price]);
        }
        Cart::where('customer_id',Auth::guard('customer')->user()->id)->delete();   
        return redirect()->back();  
    }
}
