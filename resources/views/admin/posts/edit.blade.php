@extends('layouts.admin')
@section('content')

<h1> Edit Post</h1>


{!! Form::model($post ,['action' => ['AdminpostsController@update',$post->id],'method'=>'Post','enctype'=>'multipart/form-data']) !!}
@csrf
@method('PUT')
<div class="form-group">
{{Form::Label('title')}}
{{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Enter name'])}}

</div>

<div class="form-group">
  {{Form::label('category_id','Category')}} 
  {{ Form::select('category_id',$categories,'' ,['class'=>'form-control',])}}

</div>

<div class="form-group">
    {{Form::label('photo_id','Photo')}}
    {{Form::file('photo_id',['class'=>'form-control']) }}

</div>

<div class="form-group">
{{Form::Label('body','Description')}}
{{Form::textarea('body',$post->body,['class'=>'form-control','placeholder'=>'Enter name'])}}

</div>

<div>
    {{form::submit('Edit post',['class'=> 'btn btn-primary'])}}
</div>

{!! Form::close() !!}

<br>

{!! Form::open(['method'=>'DELETE', 'action'=> ['AdminpostsController@destroy', $post->id]]) !!}



<div class="form-group">
   {!! Form::submit('Delete post', ['class'=>'btn btn-danger ']) !!}
</div>

{!! Form::close() !!}


@endsection('content')


