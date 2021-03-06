@extends('layouts.app')
@section('content')
<h3>Edit Post</h3>
{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' =>
'multipart/form-data']) !!}

<div class="form-group">
    {{Form::label('title', 'Title', ['class' => 'h4'])}}
    {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
</div>

<div class="form-group">
    {{Form::label('description', 'Description', ['class' => 'h4'])}}
    {{Form::textarea('description', $post->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description Text'])}}
</div>

<div class="form-group">
    {{Form::label('body', 'Body', ['class' => 'h4'])}}
    {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
</div>

<div class="form-group">
    {!! Form::file('cover_image') !!}
</div>

{!! Form::hidden('_method', 'PUT') !!}
{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@endsection
