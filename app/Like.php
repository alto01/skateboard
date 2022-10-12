<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['post_id','user_id'];
    
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    //いいねが既にされているかを確認
    public function like_exist($id, $post_id)
    {
        //likesテーブルのレコードにユーザーIdと投稿Idが一致するものを取得
        $exist = Like::where('user_id','=',$id)->where('post_id','=',$post_id)->get();
        
        //レコード（$exist）が存在するなら
        if (!$exist->isEmpty()){
            return true;
        //レコード（$exist）が存在しないなら
        }else{
            return false;        }
    }
}
