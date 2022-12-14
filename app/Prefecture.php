<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $table = 'prefectures';
    
    public function places()
    {
        return $this->hasMany('App\Place');
    }
}
