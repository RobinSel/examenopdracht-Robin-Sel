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
        return view('addArticle');
    }

    public function comments ($id) {

        $article = Article::find($id)->join('users', 'users.id', '=', 'articles.user_id')->select('articles.*', 'users.name')->get();;

        $comments = Comment::where('article_id', $id)->join('articles', 'comments.article_id', '=', 'articles.id')->join('users', 'users.id', '=', 'articles.user_id')->select('articles.*', 'comments.*', 'users.name')->orderby('comments.id', 'desc')->get();

        $countCom = count($comments);

        return view('comments', compact('article', 'comments', 'countCom'));
    }
}
