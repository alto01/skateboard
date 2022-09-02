<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable =[
    'name',
    'prefecture',
    'image',
    'adress',
    'user_id',
    'tag_id',
    'prefecture_id'
    ];
    
    public function prefecture()
    {
        return $this->belongsTo('App\Prefecture');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
  
}
