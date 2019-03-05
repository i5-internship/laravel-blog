@extends('layouts.app')

@section('title', 'Post-Create')

@section('contents')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Post</h1>
        <a href="{{ route('home') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Back</a>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @include('posts.form')
        </div>
    </div>

@endsection