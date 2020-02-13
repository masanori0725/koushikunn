<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Review extends Model
{
    //

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function likedBy()
    {
        return Like::where('user_id', Auth::user()->id)->where('review_id', $this->id)->first();
    }
}
