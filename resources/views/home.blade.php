@extends('layouts.layout')

@section('content')
<div class="contentborder">
  <div class="contentHeader">
    <p>Article overview</p>
  </div>
  <div class="contentCont">
    @if (count($articles) > 0)
      @foreach($articles as $article)
        <div class="article">
          <div class="rate">
            <a href="{{ route('rateUp', [$article->id]) }}"><img src="images/icon-asc.png" alt=""></a><br>
            <a href="{{ route('rateDown', [$article->id]) }}"><img src="images/icon-desc.png" alt=""></a>
          </div>
          <div class="articleInfo">
            <a href={{$article->url}}>{{$article->title}}</a>
            <div class="extraInfo">
              <p>{{$article->points}} points</p>
              <p>Ceated by {{$article->name}}</p>
              <p><a href="{{ route('comments', [$article->id]) }}">{{ $countComArray[$article->id] }} Comments</a></p>
              @guest
              @else
              <a href="{{ route('editArticle', [$article->id]) }}">Edit</a>
              @endguest
            </div>
          </div>
        </div>
      @endforeach
    @else
      <p>There are no articles</p>
    @endif
  </div>
</div>
@stop
