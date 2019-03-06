@extends('layouts.app')

@section('title','Post')

@section('contents')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Post</h1>
        <a href="{{ route('home') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Back</a>
    </div>
    <hr>
    <div class="post-preview text-center">
        <h2>
            <strong>{{ $post->title }}</strong>
        </h2>
        <h3>
            <strong>{{ $post->description }}</strong>
        </h3>
        <p class="post-meta">Posted by
            <a href="#">{{ $post->user->name }}</a>
            on {{ (\Carbon\Carbon::parse($post->created_at)->diffForHumans()) }}
            | <a href="{{ route('edit',$post->id) }}">Edit</a>
            | <a href="{{ route('delete',$post->id) }}">Delete</a>
        </p>
    </div>
@endsection