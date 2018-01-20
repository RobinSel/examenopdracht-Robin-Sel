@extends('layout')

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
            <img src="images/icon-asc.png" alt=""><br>
            <img src="images/icon-desc.png" alt="">
          </div>
          <div class="articleInfo">
            <a href={{$article->url}}>{{$article->title}}</a>
            <div class="extraInfo">
              <p>{{$article->points}} points</p>
              <p>Ceated by {{$user->name}}</p>
              <p><a href="./comments/{{ $article->id }}">... Comments</a></p>
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
