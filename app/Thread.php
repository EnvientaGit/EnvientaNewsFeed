<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
   
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner');
    }

    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }

}
