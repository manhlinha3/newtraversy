@extends('layouts.app')
@section('content')
    <h3>Posts</h3>
    @if (count($posts) > 1)
        @foreach ($posts as $post)
            <div class="card card-body bg-light mb-3">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>written on {{$post->created_at}}</small>
            </div>
        @endforeach
    @else
        <h3>No posts found!</h3>
    @endif
@endsection