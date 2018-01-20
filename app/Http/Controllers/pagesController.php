<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use DB;

class PagesController extends Controller
{
    public function home () {
        $articles = Article::join('users', 'users.id', '=', 'article.user_id')->select('articles.*', 'users.name')->get();

        return view('home')->with('articles', $articles);
    }

    public function intructies () {
        return view('intructions');
    }

    public function addarticle () {
        return view('addArticle');
    }

    public function comments ($id) {

        $article = Article::find($id);

        $comments = Comment::where('article_id', $id)->orderby('id', 'desc')->get();

        return view('comments', compact('article', 'comments'));
    }
}
