@extends('layouts.admin')

@section('content')

<h1>Posts</h1>
<table class="table table-striped table-responsive">
  <thead>
    <tr>
      <th>id</th>
      <th>Photo</th>
      <th>Owner</th>
      <th>Title</th>

      <th>Content</th>
     
      <th>Category</th>
    

      <th>Created</th>
      <th>Updated</th>
    </tr>
  </thead>
  <tbody>
  @if($posts)
  @foreach($posts as $post) 
  <tr>
     
      <td>{{$post->id}}</td>
      <td> <img height="60" width="120" src=" /images/{{$post->photo_id ? $post->photo->file :''}}" alt="No Post Photo"></td>
      <td>{{$post->user->name}}</td>
      
      
      <td> <a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
      
      <td>{{$post->body}}</td>
    
      <td>{{$post->category?$post->category->name:'Uncategorized' }}</td>
     
     
      <td>{{$post->created_at->diffForHumans()}}</td>
      <td>{{$post->updated_at->diffForHumans()}}</td>
    </tr>
  
  </tbody>
  @endforeach
  @endif
</table>



@stop
