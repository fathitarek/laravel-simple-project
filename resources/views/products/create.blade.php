@extends('layouts.app')

@section('content')

@if ($errors->any())
<ul>
@foreach ( $errors->all() as $error )
   <li>{{$error}}</li> 
@endforeach
  </ul>  
@endif

{!! Form::open( ['route' => ['product.store' ]]) !!}

<div class="col-lg-6">
    {{Form::text('name',null,["class"=>"form-control"])}}
   
</div>

<div class="col-lg-6">
    {{Form::text('description',null,["class"=>"form-control"])}}
   
</div>

<div class="col-lg-6">
    {{Form::number('before_price',null,["class"=>"form-control"])}}
   
</div>


 @foreach($colors as $color)
     <input type="checkbox" name="color_id[]" value="{{$color->id}}" >  <span style="color: {{$color->name}}">{{$color->name}}</span>
@endforeach
<div class="col-lg-6">
    {{Form::number('after_price',null,["class"=>"form-control"])}}
   
</div>
<div class="col-lg-6">
     {{ Form::select('category_id',$categories,null,['placeholder' => 'Select Category...','class'=> 'form-control','id'=>'country_id'],['option'=>'categories']) }}

   
</div>
<div class="col-lg-6">
     {{Form::submit('Add New Category',['class'=>'btn btn-primary'])}}
</div>
{{ Form::close() }}

@endsection



