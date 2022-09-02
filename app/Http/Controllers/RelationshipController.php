<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Relationship;

class RelationshipController extends Controller
{
     public function follow(User $user) {
        $follow = Relationship::create([
            'follower_id' => \Auth::user()->id,
            'followed_id' => $user->id,
        ]);
        $followedCount = count(Relationship::where('followed_id', $user->id)->get());
        $followerCount = count(Relationship::where('follower_id', $user->id)->get());
        return response()->json([
            'followedCount' => $followedCount,
            'followerCount' => $followerCount,
        ]);
    }
    
    public function unfollow(User $user) {
        $follow = Relationship::where('follower_id', \Auth::user()->id)->where('followed_id', $user->id)->first();
        $follow->delete();
        $followedCount = count(Relationship::where('followed_id', $user->id)->get());
        $followerCount = count(Relationship::where('follower_id', $user->id)->get());
        return response()->json([
            'followedCount' => $followedCount,
            'followerCount' => $followerCount,
        ]);
    }
}
