@extends('layouts.admin')


@section('content')


<h1>Media</h1>

@if($photos)

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>image</th>
            <th>Created</th>
        </tr>
    </thead>
    <tbody>


        @foreach($photos as $photo)

        <tr>
            <td>{{$photo->id}}</td>
            <td><img height="50" src="/images/{{$photo->file}}" alt=""></td>
            <td>{{$photo->created_at ? $photo->created_at : 'no date' }}</td>
            <td>

                {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminmediaController@destroy', $photo->id]]) !!}



                <div class="form-group">
                    {!! Form::submit('Delete Photo', ['class'=>'btn btn-danger ']) !!}
                </div>

                {!! Form::close() !!}

            </td>
        </tr>

        @endforeach

    </tbody>
</table>

@endif

@stop