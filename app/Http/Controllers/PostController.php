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
        return view('posts.create', compact('users','categories'));
    }

    //Record and Edit Post
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'title' => 'required|min:8'
        ]);

        try{

            DB::beginTransaction();

            if(isset($request->id)){
                $updatePost = Post::findOrFail($request->id);
                $updatePost->update($request->all());
            }
            else{
                $post = Post::create($request->all());
                $categories = $request->categories_id;
                if ($post instanceof Post){
                    $post->categories()->sync($categories);
                }
            }

            DB::commit();

        }catch (\Exception $exception){
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
        return view('posts.edit', compact('post'));
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        return redirect()->route('home');
    }
}
