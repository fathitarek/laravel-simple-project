@extends('layouts.app')

@section('content')
@if ($errors->any())
<ul>
@foreach ( $errors->all() as $error )
   <li>{{$error}}</li> 
@endforeach
  </ul>  
@endif

{{--  {{ Form::open(array('url' => 'category_update')) }}  --}}
{!! Form::model($category, ['route' => ['category.update', $category->id], 'method' => 'patch']) !!}

    {{Form::text('name',$category->name)}}

{{Form::submit('update')}}
{{ Form::close() }}



@endsection