@extends('layouts.app')

@section('content')
<div class="mb-3"></div>
    <h1>{{$post->title}}</h1>
    <small>written on {{$post->created_at}} by {{$post->user->name}}</small>
    <img src="/storage/cover_images/{{$post->cover_image}}" alt="" style="width: 100%">
    <hr>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    {{-- @if (!Auth::guest()) --}}
    @auth
        @if (auth()->user()->id == $post->user_id)  
            {{-- EDIT POST --}}
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
            {{-- DELETE POST --}}
            {{-- {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!} --}}
            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                {!! Form::hidden('_method', 'DELETE') !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
    @endauth
    {{-- @endif --}}
@endsection