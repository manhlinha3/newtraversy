@extends('layouts.app')
@section('content')
    <h3 class="py-3">Welcome to Linh Nguyen Blog</h3>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card card-body bg-light mb-3">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img src="/storage/cover_images/{{$post->cover_image}}" alt="" style="width: 100%">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
                
            </div>
        @endforeach
        {{-- paginate --}}
        {{$posts->links()}} 
        {{-- end paginate --}}
    @else
        <h3>No posts found!</h3>
    @endif
@endsection