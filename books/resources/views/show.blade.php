@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <h1 class='pagetitle'>レビュー詳細ページ</h1>
  <div class="card">
    <div class="card-body d-flex">
      <section class='review-main'>
        <h2 class='h2'>本のタイトル</h2>
        <p class='h2 mb20'>{{ $review->title }}</p>
        <h2 class='h2'>レビュー本文</h2>
        <p>{{ $review->body }}</p>
      </section>  
      <aside class='review-image'>
@if(!empty($review->image))
        <img class='book-image' src="{{ asset($review->image) }}">
@else
        <img class='book-image' src="{{ asset('images/dummy.png') }}">
@endif
      </aside>
    </div>

    <a href="{{ route('edit', ['id' => $review]) }}" class='btn btn-info btn-back mb20'>編集する</a>
    <a href="{{ route('delete', ['id' => $review]) }}" class='btn btn-info btn-back mb20' >削除する</a>
    <a href="{{ route('index') }}" class='btn btn-info btn-back mb20'>一覧へ戻る</a>
    <div class="card-body">
          <div class="row parts">
            <div id="like-icon-post-{{ $review->id }}">
              @if ($review->likedBy(Auth::user())->count() > 0)
                <a class="loved hide-text" data-remote="true" rel="nofollow" data-method="DELETE" href="/likes/{{ $review->likedBy(Auth::user())->firstOrFail()->id }}">いいねを取り消す</a>
              @else
                <a class="love hide-text" data-remote="true" rel="nofollow" data-method="POST" href="/show/{{ $review->id }}/likes">いいね</a>
              @endif
            </div>
            <a class="comment" href="#"></a>
          </div>
          <div id="like-text-post-{{ $review->id }}">
            @include('post.like_text')
          </div>
          <div>
            <span><strong>{{ $review->user->name }}</strong></span>
            <span>{{ $review->caption }}</span>
          </div>
        </div>
    <div id="comment-post-{{ $review->id }}">
      @include('post.comment_list')
    </div>
    <hr>
    <div class="row actions" id="comment-form-post-{{ $review->id }}">
      <form class="w-100" id="new_comment" action="/show/{{ $review->id }}/comments" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="✓" />
        {{csrf_field()}} 
        <input value="{{ $review->id }}" type="hidden" name="review_id" />
        <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="comments" />
      </form>
    </div>
  </div>
</div>
@endsection