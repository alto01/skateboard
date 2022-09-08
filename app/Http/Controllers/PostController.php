<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Storage;

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
        $image = $request -> file('image');
        
        if ($image != null){
            $path = Storage::disk('s3')->putFile('posts_image', $image, 'public');
            $input['image']=Storage::disk('s3')->url($path);
        }
        
        $post -> fill($input) -> save();
        
        return redirect ('/posts/'.$post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
  
}
