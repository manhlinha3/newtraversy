@extends('layouts.app')
@section('content')
<h3 class="py-3">Welcome to Linh Nguyen Blog</h3>
<div class="row">
    <section class="main-content col-md-8">
        @if (count($posts) > 0)
        @foreach ($posts as $post)
        <article class="card card-body bg-light mb-3">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <a href="/posts/{{$post->url}}"><img src="/storage/cover_images/{{$post->cover_image}}" alt="" style="width: 100%"></a>
                </div>
                <div class="col-md-6 col-sm-6">
                    <h3><a href="/posts/{{$post->url}}">{{$post->title}}</a></h3>
                    <small>written on {{$post->created_at}} by {{$post->user->name}}</small>
                    <p>{!! $post->description !!}</p>
                </div>
            </div>

        </article>
        @endforeach
        {{-- paginate --}}
        {{$posts->links()}}
        {{-- end paginate --}}
        @else
        <h3>No posts found!</h3>
        @endif
    </section>
    {{-- / main content --}}
    @include('inc.sidebar')
    {{-- / sidebar --}}
</div>
{{-- /.row --}}
@endsection
