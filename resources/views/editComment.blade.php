@extends('layout')

@section('content')
<a href="./../">Back to overview</a>
<div class="contentborder">
  <div class="contentHeader">
    <p>edit comment</p>
  </div>
  <div class="contentCont">
    <form action="./../update/{{$comment[0]->id}}" method="post">
      {{ method_field('PATCH') }}

      <label for="body">Comment</label>
      <input type="text" name="body" value="{{$comment[0]->body}}"><br>

      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="submit" name="submit" value="Edit comment">
    </form>
  </div>
</div>
@stop
