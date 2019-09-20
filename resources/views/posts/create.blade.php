@extends('layouts.app')
@section('content')
    <h3>Create Post</h3>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group">
            {{Form::label('title', 'Title', ['class' => 'h4'])}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>

        <div class="form-group">
            {{Form::label('description', 'Description', ['class' => 'h4'])}}
            {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description Text'])}}
        </div>

        <div class="form-group">
            {{Form::label('body', 'Body', ['class' => 'h4'])}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>

        <div class="form-group">
            {{Form::label('cover_image', 'Cover Image', ['class' => 'h4'])}}
            {!! Form::file('cover_image') !!}
        </div>

        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection