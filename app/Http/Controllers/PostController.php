<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    public function show($id){
        $post = Post::find($id);
        return view('posts/showpost')->with(['post' => $post]);
    }
    public function create()
    {
        return view('posts/create');
    }
    public function store(Request $request,Post $post)
    {
        $input = $request['post'];
        $post -> fill($input) -> save();
        return redirect ('/posts/'.$post->id);
    }
}
