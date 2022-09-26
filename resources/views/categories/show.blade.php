@extends('layouts.app')

@section('content')

   <p>{{$category->id}}</p> 
  <p>{{$category->name}}</p>  
   <p>{{$category->created_at}}</p>
<p>   {{$category->updated_at}}</p>

   <div class="pull-left">
                <a class="btn btn-success" href="{{ route('category.index') }}"> Back</a>
            </div>
@endsection