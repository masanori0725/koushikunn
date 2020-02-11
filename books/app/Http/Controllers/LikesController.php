<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Validator;

class LikesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        // Likeモデル作成
        $like = new Like;
        $like->review_id = $request->review_id;
        $like->user_id = Auth::user()->id;
        $like->save();

        // 「/」 ルートにリダイレクト
        return redirect('/');
    }

    public function destroy(Request $request)
    {
        $like = Like::find($request->like_id);
        $like->delete();
        return redirect('/');
    }
}
