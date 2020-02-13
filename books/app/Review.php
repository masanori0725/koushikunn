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

    public function likedBy($user)
    {
        if (Auth::user() !== null)
        return Like::where('user_id', $user->id)->where('review_id', $this->id);
        else
        return redirect('/login');
    }
}
