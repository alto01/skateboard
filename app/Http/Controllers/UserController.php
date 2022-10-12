<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

use App\User;
use App\Relationship;
use App\Like;


class UserController extends Controller
{
    public function edit($id){
        $user = User::find($id);
        return view('users/edit')->with(['user' => $user]);
    }
    public function update(Request $request,User $user){
        $input_user = $request['user'];
        $image = $request -> file('image');
        
       if ($image != null){
            $path = Storage::disk('s3')->putFile('users_image', $image, 'public');
            $input_user['image']=Storage::disk('s3')->url($path);
        }
        
        $user -> fill($input_user) ->save();
        
        return redirect('users/'.$user->id);
        
    }
    
    public function show(string $name)
    {
        $user = User::where('name', $name)->first();
        
        $posts = $user->posts->sortByDesc('created_at');

        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
    
    public function likes(string $name)
    {
        $user = User::where('name', $name)->first();

        $posts = $user->likes->sortByDesc('created_at');

        return view('users.likes', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
    
    public function Places(string $name)
    {
        $user = User::where('name', $name)->first();

        $places = $user->places->sortByDesc('created_at');

        return view('users.places', [
            'user' => $user,
            'places' => $places,
        ]);
    }
    
    public function followings(string $name)
    {
        $user = User::where('name', $name)->first();

        $followings = $user->followings->sortByDesc('created_at');

        return view('users.followings', [
            'user' => $user,
            'followings' => $followings,
        ]);
    }
    
    public function followers(string $name)
    {
        $user = User::where('name', $name)->first();

        $followers = $user->followers->sortByDesc('created_at');

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
        ]);
    }
    
    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }
    
    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }
}
