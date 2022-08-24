<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = "places";
    
    public function prefecture()
    {
        return $this->belongsTo('App\Prefecture');
    }
}
