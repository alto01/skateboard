@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<div class="card w-50 mb-3" style="margin:auto">
  <div class="card-body">
    <h5 class="card-title" style='font-size:2rem'>
        {{$post->user->name}}
        <span class='float-right' style='font-size:1rem'>{{$post->updated_at}}</span>
    </h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item" style='font-size:3rem'>{{ $post->body }}</li>
  </ul>
    @if($post->image != null)
        <img src="{{ $post->image}}" class="card-img-top">
    @endif
  <div class="card-body">
    @if($post->is_liked_by_auth_user())
    <a href="/posts/{{$post->id}}/unlike" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
    @else
    <a href="posts/{{$post->id}}/like" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
    @endif
      
  </div>
</div>

<form action="/posts/{{ $post->id }}" id="form_delete" method="post" style="display:inline">
    @csrf
    @method('DELETE')
    <input type = 'submit' style='display:none'>
    <p class ='delete'>[<span onclick='return deletePost(this);'>delete</span>]</p>
</form>


<script>
    function deletePost(e){
        'use strict';
        if(confirm('削除すると復元できません。\n本当に削除しますか？')){
            document.getElementById("form_delete").submit();
        }
    }
</script>
@endsection