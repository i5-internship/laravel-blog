@extends('layouts.app')

@section('title','Posts')

@section('contents')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Posts</h1>
        <a href="{{ route('create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Add New</a>
    </div>
    <hr>
    <div class="post-preview">
        @if(isset($posts) && count($posts)>0)
            @foreach($posts as $post)

                <a href="{{ route('show',$post->id) }}">
                    <h2 class="post-title">
                        <strong>{{ $post->title }}</strong>
                    </h2>
                    <h3 class="post-subtitle">
                        {{ $post->description }}
                    </h3>
                </a>
                <p class="post-meta">Posted by
                    <a href="#">{{ $post->user->name }}</a>
                    on {{ (\Carbon\Carbon::parse($post->created_at)->diffForHumans()) }}
                    | <a href="{{ route('edit',$post->id) }}">Edit</a>
                    | <a href="{{ route('delete',$post->id) }}">Delete</a>
                </p>

            @endforeach
        @else
        @endif
        {{ $posts->links() }}
    </div>

@endsection