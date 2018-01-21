@extends('layouts.layout')

@section('content')
<a href="{{ url('/')}}">Back to overview</a>
@if ($deleteSure == 1)
<div class="AreYouSure">
  <p>Are you sure to delete this comment</p>
  <a href="{{ route('deleteCommentSure', [$id, $comId]) }}">Yes</a>
  <a href="{{ route('comments', [$id]) }}">No</a>
</div>
@endif
@if ($deleteSureA == 1)
<div class="AreYouSure">
  <p>Are you sure to delete this article</p>
  <a href="{{ route('deleteArticleSure', [$id]) }}">Yes</a>
  <a href="{{ route('comments', [$id]) }}">No</a>
</div>
@endif
<div class="contentborder">
  <div class="contentHeader">
    <p>Article: {{$article[0]->title}}</p>
    @if ($userId == ($article[0]->user_id))
    <a href="{{ route('deleteArticle', [$id]) }}">Delete this article</a>
    @endif
  </div>
  <div class="contentCont">
    <div class="article">
      <div class="rate">
        <img src="images/icon-asc.png" alt=""><br>
        <img src="images/icon-desc.png" alt="">
      </div>
      <div class="articleInfo">
        <a href={{$article[0]->url}}>{{$article[0]->title}}</a>
        <div class="extraInfo">
          <p>{{$article[0]->points}} points</p>
          <p>Ceated by {{$article[0]->name}}</p>
          <p>{{$countCom}} Comment(s)</p>
        </div>
      </div>
    </div>
    <div class="allComments">
      <ul>
        @foreach ($comments as $comment)
        <li>
          <p>{{$comment->body}}</p>
          <div class="CommentInfo">
            <p>Posted by {{$comment->name}} on {{$comment->created_at}}</p>
            @if ($userId == ($comment->user_id))
            <a href="{{ route('editComment', [$id, $comment->id]) }}">Edit</a>
            <a href="{{ route('deleteComment', [$id, $comment->id]) }}">Delete</a>
            @endif
          </div>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="addComment">
      @guest
      <p>Login to add a comment</p>
      @else
      <form action="{{ route('storeComment', [$id])}}" method="post">
        <label for="body">Comment</label>
        <textarea name="body" rows="2" cols="80"></textarea><br>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" name="submit" value="+ Add comment">
      </form>
      @endguest
    </div>
  </div>
</div>
@stop
