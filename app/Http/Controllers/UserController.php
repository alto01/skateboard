<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

use App\User;
use App\Relationship;


class UserController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        $follow = Relationship::where('follower_id', \Auth::user()->id)->where('followed_id', $id)->first();
        $defaultCount = Relationship::where('follower_id', \Auth::user()->id)->get()->count();
        
        if(is_null($follow)){
            $defaultFollowed=false;
        }else{
            $defaultFollowed=true;
        }

        return view('users/index')->with([
            'user' => $user,
            'defaultFollowed' =>$defaultFollowed,
            'defaultCount' => $defaultCount
        ]);
    }
    public function edit($id){
        $user = User::find($id);
        return view('users/edit')->with(['user' => $user]);
    }
    public function update(Request $request,User $user){
        $input_user = $request['user'];
        $image = $request -> file('image');
        
       if ($image != null){
            $path = Storage::disk('s3')->putFile('posts_image', $image, 'public');
            $input_user['image']=Storage::disk('s3')->url($path);
        }
        
        $user -> fill($input_user) ->save();
        
        return redirect('users/'.$user->id);
        
    }
}
