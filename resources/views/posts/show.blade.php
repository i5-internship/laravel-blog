@extends('layouts.app')

@section('title' , 'Post')

@section('content')
    <header class="masthead" style="background-image: url({{ asset('img/post-bg.jpg') }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>Man must explore, and this is exploration at its greatest</h1>
                        <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
                        <span class="meta">Posted by
              <a href="#">Start Bootstrap</a>
              on August 24, 2019</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-preview">
                        @if(is_null($post))
                            Post not found
                        @else
                            <h2 class="post-title">
                                {{ $post->title }}
                            </h2>
                            <h3 class="post-subtitle">
                                {{ $post->description }}
                            </h3>
                            <p class="post-meta">Posted by
                                <a href="{{ route('get-user',$post->user->id) }}">{{ $post->user->name }}</a>
                                on September 24, 2019 | <a href="{{ route('edit',$post->id) }}">Edit</a>
                                | <a href="{{route('delete',$post->id)}}">Delete</a> |
                                @if(count($post->categories))
                                    Categories:
                                    @foreach($post->categories as $categories)
                                        {{ $categories->name }},
                                    @endforeach
                                @else
                                    No Categories
                                @endif
                            </p>
                        @endif
                    </div>
                    <br>
                    <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </article>

    <hr>

@endsection