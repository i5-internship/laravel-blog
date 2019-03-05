<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'title' => 'required|min:8'
        ]);

        if ($request->id){
            $post = Post::findOrFail($request->id);
            $post->update($request->all());
        }
        else{
            Post::create($request->all());
        }
        return redirect()->route('home');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('home');
    }
}
