@extends('layouts.app')

@section('content')

   <p>id: {{$product->id}}</p> 
  <p> name: {{$product->name}}</p>  
<p>  before price: {{$product->before_price}}</p>
<p>  after price :  {{$product->after_price}}</p>
<p> description:   {{$product->description}}</p>
<p>Colors: </p>
@foreach ($product->colors_id as $value )
    
{{$value->color->name}}
@endforeach

<p>IMages: </p>
@foreach ($product->images as $image )
    
<img src="{{$image->image}}" style="width: 50px;height:50px">
@endforeach

   <div class="">
                <a class="btn btn-success" href="{{ route('product.index') }}"> Back</a>
            </div>
@endsection