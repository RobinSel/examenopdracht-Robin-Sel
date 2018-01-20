@extends('layout')

@section('content')
<a href="{{ url('/')}}">Back to overview</a>
<div class="contentborder">
  <div class="contentHeader">
    <p>Article: (name)</p>
  </div>
  <div class="contentCont">
    <div class="article">
      <div class="rate">
        <img src="images/icon-asc.png" alt=""><br>
        <img src="images/icon-desc.png" alt="">
      </div>
      <div class="articleInfo">
        <a href={{$article->url}}>{{$article->title}}</a>
        <div class="extraInfo">
          <p>{{$article->points}} points</p>
          <p>Ceated by {{$article->user_id}}</p>
          <p>... Comments</p>
        </div>
      </div>
    </div>
    <div class="allComments">
      <ul>
        @foreach ($comments as $comment)
        <li>
          <p>{{$comment->body}}</p>
          <div class="CommentInfo">
            <p>Posted by {{$comment->user_id}} on {{$comment->created_at}}</p>
            <a href="#">Edit</a>
            <a href="./{{ $article->id }}/delete/{{$comment->id}}">Delete</a>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="addComment">
      <form action="./{{ $article->id }}/store" method="post">
        <label for="body">Comment</label>
        <textarea name="body" rows="2" cols="80"></textarea><br>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" name="submit" value="+ Add comment">
      </form>
    </div>
  </div>
</div>
@stop