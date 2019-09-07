@extends('layouts.app')

@section('content')
<div class="mb-3"></div>
    <h1>{{$post->title}}</h1>
    <small>written on {{$post->created_at}}</small>
    <hr>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

    {{-- DELETE POST --}}
    {{-- {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!} --}}
    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) !!}
        {!! Form::hidden('_method', 'DELETE') !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection