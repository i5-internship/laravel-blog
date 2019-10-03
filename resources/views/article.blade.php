@extends('layouts.app')

@section('title' , 'Contact')

@section('content')
    <div class="app">
        <header class="masthead" style="background-image: url({{ asset('img/about-bg.jpg') }})">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="page-heading">
                            <h1>About Me</h1>
                            <span class="subheading">This is what I do.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select by User</label>
                    <select class="form-control user_id">
                        <option value="-1" selected>All</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody class="list-post">
                <template v-if="posts.length > 0">
                    <tr v-for="post in posts">
                        <td>@{{ post.id }}</td>
                        <td>@{{ post.title }}</td>
                        <td>@{{ post.description }}</td>
                        <td>
                            <button class="btn btn-primary" @click="deletePost(post)">Delete</button>
                        </td>
                    </tr>
                </template>
                <template v-else>
                    <tr>
                        <td colspan="4">No any records</td>
                    </tr>
                </template>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/vue.js') }}"></script>
    <script>
        new Vue({
            el: '.app',
            data () {
                return {
                    message: 'Hello Vue',
                    posts: []
                }
            },
            methods: {
                getPosts() {
                    axios.get('http://laravel-blog.test/get-post?user_id=-1')
                        .then((response) => {
                            if (response.data.data.data.length > 0) {
                                this.posts = response.data.data.data
                            }
                        })
                },
                deletePost (post) {
                    console.log(post)
                }
            },
            mounted() {
                this.getPosts()
            }
        })
    </script>
    <script>

        function getPosts() {
            $.ajax({
                type: 'GET',
                url: 'http://laravel-blog.test/get-post',
                data: {
                    user_id: $('.user_id').val()
                },
                success: function (response) {
                    let html = ''
                    let result = response.data.data
                    result.forEach((post) => {
                        html += (
                            "<tr>" +
                            "<td>" + post.id + "</td><td>" + post.title + "</td>" +
                            "<td>" + post.description + "</td>" +
                            "<td>" +
                            "<button class='btn btn-danger delete-post' data-id='"+post.id+"'>" + 'delete' + "</button>" +
                            "</td>" +
                            "</tr>"
                        );
                    })
                    $(".list-post").html(html);
                }
            })
        }

        function deletePost(post_id){
            console.log(post_id)
            $.ajax({
                type: 'GET',
                url: 'http://laravel-blog.test/post/delete/'+post_id,
                success: function () {
                    getPosts()
                }

            })
        }

        $(function () {
            // getPosts()
            // $(document).on('change', '.user_id', function () {
            //     getPosts()
            // })
            // $(document).on('click', '.delete-post', function () {
            //     deletePost($(this).attr('data-id'))
            // })
        })
    </script>
@endsection

