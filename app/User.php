<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    
    
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'relationships', 'followed_id', 'following_id')->withTimestamps();
    }
    
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'relationships', 'following_id', 'followed_id')->withTimestamps();
    }
    
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\Post', 'likes')->withTimestamps();
    }
    
    
    
    public function isFollowedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->followers->where('id', $user->id)->count()
            : false;
    }

    public function getCountFollowersAttribute(): int
    {
        return $this->followers->count();
    }

    public function getCountFollowingsAttribute(): int
    {
        return $this->followings->count();
    }
    

}
