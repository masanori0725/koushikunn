<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/' , 'ReviewController@index')->name('index');

Route::get('/show/{id}', 'ReviewController@show')->name('show');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/review', 'ReviewController@create')->name('create');

    Route::post('/review/store', 'ReviewController@store')->name('store');

    Route::get('/edit/{id}', 'ReviewController@edit')->name('edit');

    Route::post('/update/{id}', 'ReviewController@update')->name('update');

    Route::get('/reviewdelete/{id}', 'ReviewController@destroy')->name('delete');

    //いいね処理
    Route::get('/show/{review_id}/likes', 'LikesController@store');

    //いいね取消処理
    Route::get('/likes/{like_id}', 'LikesController@destroy');


    //コメント投稿処理
    Route::post('/show/{comment_id}/comments','CommentsController@store');

    //コメント取消処理
    Route::get('/comments/{comment_id}', 'CommentsController@destroy');
});


Route::get('/home', 'HomeController@index')->name('home');


