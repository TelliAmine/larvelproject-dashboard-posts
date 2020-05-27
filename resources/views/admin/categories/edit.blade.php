@extends('layouts.admin')
@section('content')

<h1>Edit Category</h1>

<div class="col-sm-6">

{!! Form::model($category ,['action' => ['AdminCategoriesController@update',$category->id],'method'=>'Post',]) !!}
@csrf
@method('PUT')
<div class="form-group">
{{Form::Label('Name')}}
{{Form::text('name',$category->name,['class'=>'form-control','placeholder'=>'Enter name'])}}

</div>

<div>
    {{form::submit('Edit Category',['class'=> 'btn btn-primary col-sm-6'])}}
</div>

{!! Form::close() !!}


{!! Form::open(['method'=>'DELETE', 'action'=> ['AdminCategoriesController@destroy', $category->id]]) !!}

<div class="form-group">

   {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-6']) !!}

   </div>
{!! Form::close() !!}

</div>








@endsection('content')