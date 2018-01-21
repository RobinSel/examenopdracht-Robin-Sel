@extends('layouts.layout')

@section('content')
<a href="{{ route('home') }}">Back to overview</a>
<div class="contentborder">
  <div class="contentHeader">
    <p>edit article</p>
  </div>
  <div class="contentCont">
    <form action="{{ route('updateArticle', [$id]) }}" method="post">
      {{ method_field('PATCH') }}

      <label for="title">Comment</label>
      <input type="text" name="title" value="{{$article[0]->title}}"><br>

      <label for="url">Comment</label>
      <input type="text" name="url" value="{{$article[0]->url}}"><br>
      
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="submit" name="submit" value="Edit comment">
    </form>
  </div>
</div>
@stop
