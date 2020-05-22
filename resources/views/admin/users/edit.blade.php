@extends('layouts.admin')


@section('content')

<h1 style="text-align:center">Edit User</h1>
<br>
<br>
<div class="col-sm-3">
    <img src="/images/{{$user->photo?$user->photo->file:'No user Photo'}}" alt="" class="img-responsive img-rounded">
</div>
<div class="col-sm-9">
{!! Form::model($user ,['action' => ['AdminusersController@update',$user->id],'method'=>'Post','enctype'=>'multipart/form-data']) !!}
@csrf
@method('PUT')
<div class="form-group">
{{Form::Label('Name')}}
{{Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Enter name'])}}

</div>
<div class="form-group">
{{Form::Label('Email')}}
{{Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'Enter Email'])}}

</div>
<div class="form-group">
  {{Form::label('role_id','Role')}} 
  {{ Form::select('role_id', $roles,['class'=>'form-control',])}}

</div>
<div class="form-group">
  {{Form::label('Status',)}} 
  {{ Form::select('is_active',array(1=>'Active',0=>'Not Active'), null,['class'=>'form-control'])}}

</div>

<div class="form-group">
    {{Form::label('file',)}}
    {{Form::file('photo_id') }}

</div>
<div class="form-group">
{{Form::Label('Password')}}
{{ Form::password('password',array('class' => 'form-control',)) }}


</div>

<div>
    {{form::submit('create user',['class'=> 'btn btn-primary'])}}
</div>


{!! Form::close() !!}
</div>


@endsection('content')