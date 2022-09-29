@extends('layouts.app')

@section('content')
<div class="pull-left">
                <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
            </div>
        <table class="table">
            <tr>
                <td>id</td>
                <td>name</td>
                <td>Category</td>
                <td>actions</td>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->category->name}}</td>
                <td>
                    <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                <a  class="btn btn-primary" href="{{ route('product.show',$product->id) }}">show</a>    
                <a class="btn btn-warning" href="{{ route('product.edit',$product->id) }}">Edit</a>    
                {{--  <a  class="btn btn-danger" href="delete/{{$category->id}}">Delete</a>      --}}
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button> 
                    </form>  
            </td>
            </tr>
                
            @endforeach
           
        </table>
         {{$products->links()}}
   @endsection