@extends('layouts.admin')

@section('content')

<h1>Posts</h1>
<table class="table table-striped table-responsive">
  <thead>
    <tr>
      <th>id</th>
      <th>Title</th>
      <th>Content</th>
      <th>user</th>
      <th>Category</th>
      <th>Photo</th>

      <th>Created</th>
      <th>Updated</th>
    </tr>
  </thead>
  <tbody>
  @if($posts)
  @foreach($posts as $post) 
  <tr>
     
      <td>{{$post->id}}</td>
      
      
      <td> <a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
      
      <td>{{$post->body}}</td>
      <td>{{$post->user_id}}</td>
      <td>{{$post->category_id}}</td>
      <td>{{$post->photo_id}}</td>
     
      <td>{{$post->created_at->diffForHumans()}}</td>
      <td>{{$post->updated_at->diffForHumans()}}</td>
    </tr>
  
  </tbody>
  @endforeach
  @endif
</table>



@stop
