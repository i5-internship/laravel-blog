<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
//        $posts = Post::get();
//        return view('posts.post', compact('posts'));
    }

    public function createPost()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        Post::create($request->all());
        return redirect()->route('home');
    }

    public function getPost($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        return redirect()->route('home');
    }
}
