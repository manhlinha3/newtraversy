@extends('layouts.app')
@include('inc.topSlider')
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

{{-- featured posts --}}
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <img src="/storage/demo_images/demo_square.jpg" alt="" style="width: 100%">
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <h3>Post Title</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        <a href="" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <img src="/storage/demo_images/demo_square.jpg" alt="" style="width: 100%">
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <h3>Post Title</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        <a href="" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
