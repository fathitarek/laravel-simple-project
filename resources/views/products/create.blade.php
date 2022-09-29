@extends('layouts.app')

@section('content')

@if ($errors->any())
<ul>
@foreach ( $errors->all() as $error )
   <li>{{$error}}</li> 
@endforeach
  </ul>  
@endif

{!! Form::open( ['route' => ['product.store' ],"files"=>true]) !!}

<div class="col-lg-6">
    {{Form::text('name',null,["class"=>"form-control","placeholder"=> "Name"])}}
   
</div>

<div class="col-lg-6">
    {{Form::text('description',null,["class"=>"form-control" ,"placeholder"=> "description"])}}
   
</div>

<div class="col-lg-6">
    {{Form::number('before_price',null,["class"=>"form-control" ,"placeholder"=> "before price"])}}
   
</div>


<div class="col-lg-6">
    {{Form::number('after_price',null,["class"=>"form-control" ,"placeholder"=> "after price"])}}
   
</div>
<div class="col-lg-6">
     {{ Form::select('category_id',$categories,null,['placeholder' => 'Select Category...','class'=> 'form-control','id'=>'country_id'],['option'=>'categories']) }}
</div>


<div class="col-lg-6">   
    <input required type="file" class="form-control" name="images[]" placeholder="Images" multiple>

</div>

<div class="col-lg-6 ">
 @foreach($colors as $color)
     <input type="checkbox" class="" name="color_id[]" value="{{$color->id}}" >  <span style="color: {{$color->name}}">{{$color->name}}</span>
@endforeach
</div>
<br>
<div class="col-lg-12">
     {{Form::submit('Add New Product',['class'=>'btn btn-primary'])}}
</div>
{{ Form::close() }}

@endsection



