<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $fillable = ['following_id', 'followed_id'];

    protected $table = 'relationships';
}
