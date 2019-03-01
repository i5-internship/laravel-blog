@extends('layouts.app')

@section('title','User-Show')

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
                <h1>Welcome User</h1><a href="{{ url('/') }}">Back</a>
                <hr>
                <div class="post-preview">
                    <table class="col-md-12" border="1">
                        @if(is_null($datafound))
                            <h1>{{ $message }}</h1>
                        @else
                            <tr>
                                <th>ID</th>
                                <td>
                                    : {{ $datafound['id'] }}
                                </td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>
                                    : {{ $datafound['name'] }}
                                </td>
                            </tr>
                            <tr>
                                <th style="vertical-align: top">Description</th>
                                <td>
                                    : {{ $datafound['description'] }}
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

    <hr>
@endsection