@extends('layouts.app')

@section('content')
<div class="mb-3"></div>
    <h1>{{$post->title}}</h1>
    <small>written on {{$post->created_at}}</small>
    <hr>
    <div>
        {{$post->body}}
    </div>
@endsection