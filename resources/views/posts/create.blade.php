<!DOCTYPE HTML>
@extends('layouts.app')

@section('content')

<h1 class='m-5'>New Post</h1>

<form class = 'm-5' action="/posts" method="POST" enctype="multipart/form-data" >
    @csrf
  <div class="col-md-5"style="margin:auto">
    <div class="mb-3 pb-3">
      <label for="body" class="form-label">Body</label>
      <textarea class="form-control"  name="post[body]" placeholder="今日あった出来事"></textarea>
    </div>
  
    <div class="mb-3 pb-3">
      <label for="image" class="form-label">Image</label><br>
      <input type="file"  name="image">
    </div>
    <input type="hidden" name="post[user_id]" value={{\Auth::user()->id}} />
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>




@endsection