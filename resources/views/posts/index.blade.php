@extends('layouts.app')
@section('content')
<h3 class="py-3">Welcome to Linh Nguyen Blog</h3>
<div class="row">
    <section class="main-content col-md-8">
        @if (count($posts) > 0)
        @foreach ($posts as $post)
        <article class="card card-body bg-light mb-3">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <img src="/storage/cover_images/{{$post->cover_image}}" alt="" style="width: 100%">
                </div>
                <div class="col-md-8 col-sm-8">
                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                    <small>written on {{$post->created_at}} by {{$post->user->name}}</small>
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
    <aside class="sidebar col-md-4">

        {{-- about me --}}
        <div class="card bg-light">
            <h1 class="card-header sidebar-header">About me</h1>
            <div class="card-body">
                You can put anything you want inside of these side widgets. They are easy to use, and feature the new
                Bootstrap 4 card containers!
                readmore
            </div>
        </div>

        {{-- categories --}}
        <div class="card bg-light my-3">
            <h1 class="card-header sidebar-header">Categories</h1>
            <div class="card-body">
                {{-- <p>this is categories body</p> --}}
                <ul class="list-unstyled">
                    <li><a href="">Cat 1</a></li>
                    <li><a href="">Cat 2</a></li>
                    <li><a href="">Cat 3</a></li>
                    <li><a href="">Cat 4</a></li>
                </ul>
            </div>
        </div>

        {{-- side widget --}}
        <div class="card bg-light my-3 ">
            <h1 class="card-header sidebar-header">Side Widget</h1>
            <div class="card-body">
                You can put anything you want inside of these side widgets. They are easy to use, and feature the new
                Bootstrap 4 card containers!
                readmore
            </div>
        </div>
    </aside>
    {{-- / sidebar --}}
</div>
{{-- /.row --}}
@endsection
