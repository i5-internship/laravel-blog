@extends('layouts.app')

@section('title' , 'Home')

@section('content')
    <header class="masthead" style="background-image: url({{ asset('img/home-bg.jpg') }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">
                    @if(isset($posts) && count($posts)>0)
                        @foreach($posts as $post)
                            <a href="{{ route('get-post',$post->id) }}">
                                <h2 class="post-title">
                                    {{ $post->title }}
                                </h2>
                                <h3 class="post-subtitle">
                                    {{ $post->description }}
                                </h3>
                            </a>
                            <p class="post-meta">Posted by
                                <a href="#">Start Bootstrap</a>
                                on {{ new \Carbon\Carbon( $post->created_at ) }} | <a href="{{ route('edit', $post->id) }}">Edit</a>
                                | <a href="{{ route('delete',$post->id) }}">Delete</a>
                            </p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <hr>
@endsection