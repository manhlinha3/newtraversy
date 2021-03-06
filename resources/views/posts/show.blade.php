@extends('layouts.app')

@section('content')

<div class="row my-3">
    <section class="main-content col-md-8">
        <div class="text-center mb-3">
            <img src="/storage/cover_images/{{$post->cover_image}}" alt="" style="height: 500px; width: auto;" class="">
        </div>
        <h1>{{$post->title}}</h1>
        <div><small>written on {{$post->created_at}} by {{$post->user->name}}</small></div>
        <hr>

        <div>
            {!! $post->description !!}
        </div>
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
        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' =>
        'float-right']) !!}
        {!! Form::hidden('_method', 'DELETE') !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @endif
        @endauth
        {{-- @endif --}}
    </section>
    {{-- / main content --}}
    @include('inc.sidebar')
    {{-- / sidebar --}}
</div>

@endsection
