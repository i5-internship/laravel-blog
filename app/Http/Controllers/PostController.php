<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(15);
        return view('index', compact('posts'));
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', compact('users'));
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
