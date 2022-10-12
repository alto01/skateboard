<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Post extends Model
{
  use SoftDeletes;
  protected $fillable =[
    'body',
    'user_id',
    'image',
    ];
    
  protected $appends = [
      'likes_count', 'liked_by_user',
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
     return $this->belongsToMany('App\User','likes')->withTimestamps();
   }
  
    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->likes->where('id', $user->id)->count()
            : false;
    }
    
    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }
  
  
}
