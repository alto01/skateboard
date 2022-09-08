<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function places()
    {
        return $this->hasMany('App\Place');
    }
    
    
 // フォロワー→フォロー
    public function followed()
    {
        return $this->belongsToMany('App\User', 'relationships', 'followed_id', 'follower_id');
    }

    // フォロー→フォロワー
    public function follower()
    {
        return $this->belongsToMany('App\User', 'relationships', 'follower_id', 'followed_id');
    }

    public function relationship()
    {
        return $this->hasMany('App\Relationship');
    }
}
