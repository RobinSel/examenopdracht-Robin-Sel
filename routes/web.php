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

Route::get('/', 'PagesController@home')->name('home');
Route::get('/home', 'PagesController@home')->name('home');
Route::get('/article/add', 'PagesController@addarticle')->name('addArticle');

Route::get('/comments/{id}', 'PagesController@comments')->name('comments');

Route::post('article/store', 'ArticleController@store')->name('storeArticle');
Route::post('comments/{id}/store', 'ArticleController@storeComment')->name('storeComment');

Route::get('comments/{id}/delete/{commentId}', 'ArticleController@deleteComment')->name('deleteComment');
Route::get('comments/{id}/delete/{commentId}/sure', 'ArticleController@deleteSureComment')->name('deleteCommentSure');

Route::get('comments/{id}/delete', 'ArticleController@deleteArticle')->name('deleteArticle');
Route::get('comments/{id}/delete/sure', 'ArticleController@deleteSureArticle')->name('deleteArticleSure');

Route::get('comments/{id}/edit/{commentId}', 'ArticleController@editComment')->name('editComment');
Route::patch('comments/{id}/update/{commentId}', 'ArticleController@updateComment')->name('updateComment');
