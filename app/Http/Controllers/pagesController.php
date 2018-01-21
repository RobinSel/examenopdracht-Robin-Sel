<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use DB;

class PagesController extends Controller
{
    public function home () {
        $articles = Article::join('users', 'users.id', '=', 'articles.user_id')->orderby('id', 'desc')->select('articles.*', 'users.name')->get();

        $articleHighestId = Article::orderby('id', 'desc')->select('articles.id')->first();
        $number = $articleHighestId->id;

        $countComArray = array();

        for ($a=1; $a <= $number ; $a++) {
          if (Article::where('id', $a)->exists()) {
            $c = Comment::where('comments.article_id', $a)->get();
            $count = count($c);

            $countComArray[$a] = $count;
          }
        }

        return view('home', compact('articles', 'countComArray'));
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

        $article = Article::where('articles.id', $id)->join('users', 'users.id', '=', 'articles.user_id')->select('articles.*', 'users.name')->get();

        $comments = Comment::where('article_id', $id)->join('articles', 'comments.article_id', '=', 'articles.id')->join('users', 'users.id', '=', 'articles.user_id')->select('articles.*', 'comments.*', 'users.name')->orderby('comments.id', 'desc')->get();

        $countCom = count($comments);

        $id=$id;
        $comId = 0;
        $deleteSure = 0;
        $deleteSureA = 0;

        return view('comments', compact('article', 'comments', 'countCom', 'id', 'deleteSure', 'userId', 'deleteSureA', 'comId'));
    }
}
