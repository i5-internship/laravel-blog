<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryPost;
use App\User;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
//        $posts = Post::get();
//        return view('posts.post', compact('posts'));
    }

    public function createPost()
    {
        $users = User::all();
        $categories = Category::all();
        return view('posts.create', compact('users', 'categories'));
    }

    //Record and Edit Post
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'title' => 'required|min:8'
        ]);

        try {

            DB::beginTransaction();
            $post = null;

            if (isset($request->id)) {
                $post = Post::findOrFail($request->id);
                $post->update($request->all());
            } else {
                $post = Post::create($request->all());
            }

            if ($post instanceof Post) {
                $post->categories()->sync($request->categories_id);
            }

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return redirect()->route('home');
    }

    public function getPost($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $users = User::all();
        $categories = Category::all();
        return view('posts.edit', compact('post', 'users', 'categories'));
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        return redirect()->route('home');
    }
}
