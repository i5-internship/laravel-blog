@extends('layouts.app')

@section('title' , 'Post')

@section('content')
    <header class="masthead" style="background-image: url({{ asset('img/post-bg.jpg') }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">php
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
                    <form method="POST" action="#">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Tittle</label>
                            <input name="title" type="text" class="form-control" placeholder="Title" value="{{ $post->title }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" rows="4" type="text" class="form-control"
                                      placeholder="Description">{{ $post->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </article>

    <hr>

@endsection