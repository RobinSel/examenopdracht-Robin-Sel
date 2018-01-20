<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;

class ArticleController extends Controller
{
    public function store (Request $request) {

      $article = new Article;

      $article->title = $request->title;
      $article->url = $request->url;
      $article->user_id = 1;
      $article->points = 0;

      $article->save();

      $articles = Article::all();

      return redirect('/')->with('articles', $articles);
    }

    public function storeComment ($id, Request $request) {

      $comment = new Comment;

      $comment->user_id = 1;
      $comment->article_id = $id;
      $comment->body = $request->body;

      $comment->save();

      $article = Article::find($id);

      $comments = Comment::where('article_id', $id)->get();

      return redirect()->action('PagesController@comments', ['id' => $id]);

    }
    public function deleteComment ($id, Request $request) {


      $article = Article::find($id, $comid);

      $comments = Comment::where('article_id', $id)->get();

      

      return redirect()->action('PagesController@comments', ['id' => $id]);

    }
}
