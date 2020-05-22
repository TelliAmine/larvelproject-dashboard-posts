
@extends('layouts.admin')
@section('content')

<h1>Users</h1>
<table class="table table-striped table-responsive">
  <thead>
    <tr>
      <th>id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>Active</th>
      <th>Created</th>
      <th>Updated</th>
    </tr>
  </thead>
  <tbody>
  @if($users)
  @foreach($users as $user) 
  <tr>
     
      <td>{{$user->id}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{ !empty($user->role) ? $user->role->name:'No Role' }}</td>
      <td> 
          {{$user->is_active==1 ?'Active':'Not Active'}}</td>
     
      <td>{{$user->created_at->diffForHumans()}}</td>
      <td>{{$user->updated_at->diffForHumans()}}</td>
    </tr>
  
  </tbody>
  @endforeach
  @endif
</table>



@endsection('content')