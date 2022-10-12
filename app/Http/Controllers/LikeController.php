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
        Auth::user()->like($id);
        return 'ok!'; //レスポンス内容
    }
    
    // 引数のIDに紐づくリプライにUNLIKEする
    public function unlike($id)
    {
        Auth::user()->unlike($id);
        return 'ok!'; //レスポンス内容
    }
    
}
