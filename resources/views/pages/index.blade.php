@extends('layouts.app')
@section('content')
{{-- <h1>{{$title}}</h1>
<p>This is laravel from Linh Nguyen</p> --}}
<div class="jumbotron">
    <div class="container text-center">
        <h1>{{$title}}</h1>
        <p>This is a blog built by Laravel</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Login</a> <a class="btn btn-success btn-lg" href="#" role="button">Register</a></p>
    </div>
</div>
@endsection
