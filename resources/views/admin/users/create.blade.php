@extends('layouts.admin')
@section('content')

<h1>Create Users</h1>
{!! Form::open(['action' => 'AdminusersController@store','method'=>'Post','enctype'=>'multipart/form-data']) !!}
<div class="form-group">
{{Form::Label('Name')}}
{{Form::text('name','',['class'=>'form-control','placeholder'=>'Enter name'])}}

</div>
<div class="form-group">
{{Form::Label('Email')}}
{{Form::email('email','',['class'=>'form-control','placeholder'=>'Enter Email'])}}

</div>
<div class="form-group">
  {{Form::label('role_id','Role')}} 
  {{ Form::select('role_id', [''=>'Choose Options'] +$roles,null ,['class'=>'form-control',])}}

</div>
<div class="form-group">
  {{Form::label('Status',)}} 
  {{ Form::select('is_active',array(1=>'Active',0=>'Not Active'), '0',['class'=>'form-control'])}}

</div>

<div class="form-group">
    {{Form::label('file',)}}
    {{Form::file('file') }}

</div>
<div class="form-group">
{{Form::Label('Password')}}
{{Form::text('password','',['class'=>'form-control','placeholder'=>'Enter text'])}}

</div>

<div>
    {{form::submit('create user',['class'=> 'btn btn-primary'])}}
</div>

{!! Form::close() !!}


@endsection('content')