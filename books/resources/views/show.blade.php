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
        <h4 class='h4 text-muted'>本のタイトル</h4>
        <p class='h2 mb50'>{{ $review->title }}</p>
        <h4 class='h4 text-muted'>レビュー本文</h4>
        <p>{{ $review->body }}</p>
      </section>  
      <aside class='review-image'>
@if(!empty($review->image))
        <img class='book-image' src="{{ asset($review->image) }}">
        <input type="hidden" name="image" value="$review->image">
@else
        <img class='book-image' src="{{ asset('images/dummy.png') }}">
@endif
      </aside>
    </div>
    <div class="link">
      <a href="{{ route('edit', ['id' => $review]) }}" class='btn btn-info btn-back mb20 mr10'>編集する</a>
      <a href="{{ route('delete', ['id' => $review]) }}" class='btn btn-info btn-back mb20 mr10' >削除する</a>
      <a href="{{ route('index') }}" class='btn btn-info btn-back mb20'>一覧へ戻る</a>
    </div>
    <div class="card-body">
          <div class="row parts">
            <div id="like-icon-post-{{ $review->id }}">
          
              @if (Auth::user() !== null)
                @if ($review->likedBy() )
                <a class="loved hide-text" data-remote="true" rel="nofollow" data-method="DELETE" href="/likes/{{ $review->likedBy()->id }}">いいねを取り消す</a>
                @else
                <a class="love hide-text" data-remote="true" rel="nofollow" data-method="POST" href="/show/{{ $review->id }}/likes">いいね</a>
                @endif
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
          </div>
        </div>
    <div id="comment-post-{{ $review->id }}">
      @include('post.comment_list')
    </div>
    <hr>
    <div class="row actions" id="comment-form-post-{{ $review->id }}">
      <form class="w-75 ml-3" id="new_comment" action="/show/{{ $review->id }}/comments" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="✓" />
        {{csrf_field()}} 
        <input value="{{ $review->id }}" type="hidden" name="review_id" />
        <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="comments" />
      </form>
    </div>
  </div>
</div>
@endsection