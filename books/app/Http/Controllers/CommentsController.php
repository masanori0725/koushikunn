<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Review;
use Auth;
use Validator;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        // Commentモデル作成
        $comment = new Comment;
        $comment->comments = $request->comments;
        $comment->review_id = $request->review_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return redirect('/');
    }  
    
    public function destroy(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect('/');
    }

}
