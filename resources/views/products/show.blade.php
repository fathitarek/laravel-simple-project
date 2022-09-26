@extends('layouts.app')

@section('content')

   <p>{{$product->id}}</p> 
  <p>{{$product->name}}</p>  
   <p>{{$product->created_at}}</p>
<p>   {{$product->updated_at}}</p>
<p>   {{$product->before_price}}</p>
<p>   {{$product->after_price}}</p>
<p>   {{$product->description}}</p>
@foreach ($product->colors_id as $value )
    
{{$value->color->name}}
@endforeach

   <div class="pull-left">
                <a class="btn btn-success" href="{{ route('product.index') }}"> Back</a>
            </div>
@endsection