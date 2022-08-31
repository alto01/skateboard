<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;

class LikeController extends Controller
{
     // 引数のIDに紐づく投稿にLIKEする
    public function like($id)
    {
        Like::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
        ]);

        session()->flash('success', 'You Liked the Post.');

        return redirect()->back();
    }
    
    // 引数のIDに紐づくリプライにUNLIKEする
    public function unlike($id)
    {
        $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
    
        session()->flash('success', 'You Unliked the Post.');
    
        return redirect()->back();
    }
}
