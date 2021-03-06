<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    //
    public function index()
    {
        $reviews = Review::where('status', 1)->orderBy('created_at', 'DESC')->paginate(9);
        return view('index', compact('reviews'));
    }

    public function show($id)
    {
        $review = Review::where('id', $id)->where('status', 1)->first();
        return view('show', compact('review'));
    }

    public function create()
    {
        return view('review');
    }

    public function store(Request $request)
    {
        $post = $request->all();

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->file('image')->store('/public/images');
            $filename = str_replace('public/', 'storage/', $filename);
            $data = ['user_id' => \Auth::id(), 'title' => $post['title'], 'body' => $post['body'], 'image' => $filename];
        } else {
            $data = ['user_id' => \Auth::id(), 'title' => $post['title'], 'body' => $post['body']];
        }
        

        Review::insert($data);

        return redirect('/')->with('flash_message', '投稿が完了しました');
    }


    public function edit($review_id)
    {
        $review = Review::find($review_id);
        return view('edit', ['review' => $review]);  
    }

    public function update(Request $request)
    {
        $review = Review::find($request->id);
        $review->title = $request->title;
        $review->body = $request->body;
        
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->store('/public/images');
            $filename = str_replace('public/', 'storage/', $filename);
            $review->image = $filename;
        }
        $review->save();
        return redirect('/')->with('flash_message', '編集が完了しました');
    }


    public function destroy($review_id)
    {
        $review = Review::find($review_id);
        $review->delete();
        return redirect('/')->with('flash_message', 'レビューを削除しました');
    }
}
