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
                    @if(isset($datas) && count($datas) > 0)
                        @foreach($datas as $data)
                            <h3><a href="{{ route('get-user', $data->id) }}">{{ $data->name }} </a></h3><br>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <hr>
@endsection