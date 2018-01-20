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

Route::get('/', 'PagesController@home');
Route::get('/home', 'PagesController@home');
Route::get('/intructies', 'PagesController@intructies');
Route::get('/article/add', 'PagesController@addarticle');

Route::get('/comments/{id}', 'PagesController@comments');

Route::post('article/store', 'ArticleController@store');
Route::post('comments/{id}/store', 'ArticleController@storeComment');

Route::post('comments/{id}/delete/{commentId}', 'ArticleController@deleteComment');
Route::post('comments/{id}/delete/{commentId}/sure', 'ArticleController@deleteSureComment');

Route::get('comments/{id}/edit/{commentId}', 'ArticleController@editComment');
Route::patch('comments/{id}/update/{commentId}', 'ArticleController@updateComment');
