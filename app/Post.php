<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable =[
    'body',
    'user_id',
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
}
