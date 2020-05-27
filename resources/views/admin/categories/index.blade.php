@extends('layouts.admin')
@section('content')

<h1>categories</h1>
<br>
<div class="col-sm-5">

{!! Form::open(['action' => 'AdminCategoriesController@store','method'=>'Post','enctype'=>'multipart/form-data']) !!}
<div class="form-group">
{{Form::Label('Name')}}
{{Form::text('name','',['class'=>'form-control','placeholder'=>'Enter name'])}}

</div>

<div>
    {{form::submit('create Category',['class'=> 'btn btn-primary'])}}
</div>

{!! Form::close() !!}
</div>


@if($categories)
<div class="col-sm-7">


<table class="table table-striped table-responsive">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Created</th>
    </tr>
  </thead>
  <tbody>
      @foreach($categories as $category)
    <tr>
      <td>{{$category->id}}</td>
      <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
      <td>{{$category->created_at?$category->created_at:'no date'}}</td>
    </tr>
  
   @endforeach
  </tbody>
</table>

@endif

</div>










@endsection('content')