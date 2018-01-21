@extends('layouts.layout')

@section('content')
<a href="{{ url('/')}}">Back to overview</a>
<div class="contentborder">
  <div class="contentHeader">
    <p>Add article</p>
  </div>
  <div class="contentCont">
    <form action="./store" method="post">
      <label for="title">Title</label>
      <input type="text" name="title"><br>

      <label for="url">Url</label>
      <input type="text" name="url"><br>

      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="submit" name="submit" value="+ Add article">
    </form>
  </div>
</div>
@stop
