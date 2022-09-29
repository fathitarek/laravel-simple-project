<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductsColor;
use App\ProductsImages;
use Illuminate\Http\Request;

class ProductController extends Controller
{

public function __construct()
{
    $this->middleware('auth');
    // $this->middleware('auth', ['except' => ['index', 'show']]);
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $products=  Product::with(['category'])->paginate(3);
      return view('products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::latest()->pluck('name', 'id');
        $colors=\DB::table('colors')->get();
        // return $colors;
        return view('products.create')->with('categories',$categories)->with('colors',$colors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
       $product=  Product::create(['name'=>$request->name,'category_id'=>$request->category_id,'before_price'=>$request->before_price,'after_price'=>$request->after_price,
         'description'=>$request->description]);

         for ($i=0; $i <count($request->color_id) ; $i++) { 
            ProductsColor::create(['product_id'=>$product->id,"color_id"=>$request->color_id[$i]]);
         }
        
      if($files=$request->file('images')){
            foreach($files as $file){
            $file->move(public_path('/uploads'), $file->getClientOriginalName());
            $path='/uploads/'.$file->getClientOriginalName();
            ProductsImages::create(['product_id'=>$product->id,"image"=>$path]);
            }
        }
     
          return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // return $product;
       $product->colors_id= ProductsColor::select('color_id')->with(["color"])->where('product_id',$product->id)->get();
       $product->images= ProductsImages::select('image')->where('product_id',$product->id)->get();
    //    return $product;
       return view('products.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        ProductsColor::where('product_id',$product->id)->delete();
        ProductsImages::where('product_id',$product->id)->delete();
         $product->delete();
         return redirect()->route('product.index');
    }
}
