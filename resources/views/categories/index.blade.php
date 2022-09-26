@extends('layouts.app')

@section('content')
<div class="pull-left">
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Category</a>
            </div>
        <table class="table">
            <tr>
                <td>id</td>
                <td>name</td>
                <td>actions</td>
            </tr>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                <a  class="btn btn-primary" href="{{ route('category.show',$category->id) }}">show</a>    
                <a class="btn btn-warning" href="{{ route('category.edit',$category->id) }}">Edit</a>    
                {{--  <a  class="btn btn-danger" href="delete/{{$category->id}}">Delete</a>      --}}
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button> 
                    </form>  
            </td>
            </tr>
                
            @endforeach
           
        </table>
         {{$categories->links()}}
   @endsection