<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{
  protected $fillable =[
    'body',
    'user_id',
    'image',
    ];
    
  public function getPaginateByLimit(int $limit_count = 10)
  {
        // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
  }
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function likes()
  {
    return $this->hasMany('App\Like');
  }
  
  /**
  * リプライにLIKEを付いているかの判定
  *
  * @return bool true:Likeがついてる false:Likeがついてない
  */
  public function is_liked_by_auth_user()
  {
    $id = Auth::id();

    $likers = array();
    foreach($this->likes as $like) {
      array_push($likers, $like->user_id);
    }

    if (in_array($id, $likers)) {
      return true;
    } else {
      return false;
    }
  }
}
