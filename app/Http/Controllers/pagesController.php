<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use DB;

class PagesController extends Controller
{
    public function home () {
        $articles = Article::join('users', 'users.id', '=', 'articles.user_id')->select('articles.*', 'users.name')->get();

        return view('home')->with('articles', $articles);
    }

    public function intructies () {
        return view('intructions');
    }

    public function addarticle () {
        if (\Auth::check()) {
            return view('addArticle');
        }
        else {
          return back();
        }
    }

    public function comments ($id) {

        if (\Auth::check()) {
          $userId = \Auth::user()->id;
        }
        else {
          $userId = 0;
        }

        $article = Article::where('articles.id', $id)->join('users', 'users.id', '=', 'articles.user_id')->select('articles.*', 'users.name')->get();;

        $comments = Comment::where('article_id', $id)->join('articles', 'comments.article_id', '=', 'articles.id')->join('users', 'users.id', '=', 'articles.user_id')->select('articles.*', 'comments.*', 'users.name')->orderby('comments.id', 'desc')->get();

        $countCom = count($comments);

        $id=$id;
        $deleteSure = 0;

        return view('comments', compact('article', 'comments', 'countCom', 'id', 'deleteSure', 'userId'));
    }
}
