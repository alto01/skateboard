<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }
    
    public function index(Post $post)
    {
        
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post){
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts/create');
    }
    
    
    public function store(PostRequest $request,Post $post)
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
    
    public function edit(Post $post){
        return view('posts/edit')->with(['post'=>$post]);
    }
    
    public function update(PostRequest $request,Post $post){
        
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
    
    //いいね機能
    public function like(Request $request, Post $post)
    {
        $post->likes()->detach($request->user()->id);
        $post->likes()->attach($request->user()->id);

        return [
            'id' => $post->id,
            'countLikes' => $post->count_likes,
        ];
    }

    public function unlike(Request $request, Post $post)
    {
        $post->likes()->detach($request->user()->id);

        return [
            'id' => $post->id,
            'countLikes' => $post->count_likes,
        ];
    }
  
}
