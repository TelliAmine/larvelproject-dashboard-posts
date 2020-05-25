@extends('layouts.admin')
@section('content')

<h1> Create Post</h1>


{!! Form::open(['action' => 'AdminpostsController@store','method'=>'Post','enctype'=>'multipart/form-data']) !!}
<div class="form-group">
{{Form::Label('title')}}
{{Form::text('title','',['class'=>'form-control','placeholder'=>'Enter name'])}}

</div>

<div class="form-group">
  {{Form::label('category_id','Category')}} 
  {{ Form::select('category_id', [1=>'php',2=>'js'],null ,['class'=>'form-control',])}}

</div>

<div class="form-group">
    {{Form::label('photo_id','Photo')}}
    {{Form::file('photo_id',['class'=>'form-control']) }}

</div>

<div class="form-group">
{{Form::Label('body','Description')}}
{{Form::textarea('body','',['class'=>'form-control','placeholder'=>'Enter name'])}}

</div>

<div>
    {{form::submit('create post',['class'=> 'btn btn-primary'])}}
</div>

{!! Form::close() !!}


@endsection('content')


