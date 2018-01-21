<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use App\Http\Controllers\Auth;

class ArticleController extends Controller
{
    public function store (Request $request) {

      $userId = \Auth::user()->id;

      $article = new Article;

      $article->title = $request->title;
      $article->url = $request->url;
      $article->user_id = $userId;
      $article->points = 0;

      $article->save();

      $articles = Article::all();

      return redirect('/')->with('articles', $articles);
    }

    public function storeComment ($id, Request $request) {

      $userId = \Auth::user()->id;

      $comment = new Comment;

      $comment->user_id = $userId;
      $comment->article_id = $id;
      $comment->body = $request->body;

      $comment->save();

      $article = Article::find($id);

      $comments = Comment::where('article_id', $id)->get();


      return redirect()->action('PagesController@comments', ['id' => $id]);

    }
//----------------------------------------------------------------------------------------------------------------
    public function editArticle($id) {
      if (\Auth::check()) {
        $userId = \Auth::user()->id;

        $article = Article::where('articles.id', $id)->get();

        if ($userId == ($article[0]->user_id)){
        $id=$id;

        return view('editArticle', compact('article', 'id'));
        }
        else {
          return back();
        }
      }
      else {
        return back();
      }
    }

    public function updateArticle ($id, Request $request) {

      $articleToEdit = Article::where('id', $id)->update(['title' => $request->title, 'url' => $request->url]);

      return back();
    }

//----------------------------------------------------------------------------------------------------------------
    public function editComment ($id, $comId) {

      if (\Auth::check()) {
        $userId = \Auth::user()->id;

        $comment = Comment::where('comments.id', $comId)->get();
        $commentUserId = Comment::where('comments.id', $comId)->get();

        if ($userId == ($commentUserId[0]->user_id)){
          $comment = Comment::where('comments.id', $comId)->get();

          $articleId = $id;

          return view('editComment', compact('comment', 'articleId'));
        }
        else {
          return back();
        }
      }
      else {
        return back();
      }

    }

    public function updateComment ($id, $comId, Request $request) {

      $commentToEdit = Comment::where('id', $comId)->update(['body' => $request->body]);

      return back();
    }
//----------------------------------------------------------------------------------------------------------------
    public function deleteComment ($id, $comId) {

      if (\Auth::check()) {
        $userId = \Auth::user()->id;
      }
      else {
        return back();
      }

      $article = Article::find($id)->join('users', 'users.id', '=', 'articles.user_id')->select('articles.*', 'users.name')->get();

      $comments = Comment::where('article_id', $id)->join('articles', 'comments.article_id', '=', 'articles.id')->join('users', 'users.id', '=', 'articles.user_id')->select('articles.*', 'comments.*', 'users.name')->orderby('comments.id', 'desc')->get();

      $countCom = count($comments);

      $id=$id;
      $comId=$comId;
      $deleteSure = 1;
      $deleteSureA = 0;

      return view('comments', compact('article', 'comments', 'countCom', 'id', 'comId', 'deleteSure', 'userId', 'deleteSureA'));

    }

    public function deleteSureComment ($id, $comId) {

      $comment = Comment::where('id', $comId)->delete();

      return redirect()->action('PagesController@comments', ['id' => $id]);
    }
//----------------------------------------------------------------------------------------------------------------
    public function deleteArticle ($id) {

      if (\Auth::check()) {
        $userId = \Auth::user()->id;
      }
      else {
        return back();
      }

      $article = Article::find($id)->join('users', 'users.id', '=', 'articles.user_id')->select('articles.*', 'users.name')->get();

      $comments = Comment::where('article_id', $id)->join('articles', 'comments.article_id', '=', 'articles.id')->join('users', 'users.id', '=', 'articles.user_id')->select('articles.*', 'comments.*', 'users.name')->orderby('comments.id', 'desc')->get();

      $countCom = count($comments);

      $id=$id;
      $deleteSure = 0;
      $deleteSureA = 1;

      return view('comments', compact('article', 'comments', 'countCom', 'id', 'deleteSure', 'userId', 'deleteSureA'));

    }

    public function deleteSureArticle ($id) {

      $comments = Comment::where('article_id', $id)->delete();
      $article = Article::where('id', $id)->delete();

      return redirect()->action('PagesController@home');
    }
}
