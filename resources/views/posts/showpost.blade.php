@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <form action="/posts/{{ $post->id }}" id="form_delete" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <input type = 'submit' style='display:none'>
            <p class ='delete'>[<span onclick='return deletePost(this);'>delete</span>]</p>
        </form>
        <div class="post">
            <h3>{{$post->user->name}}</h3>
            <p>{{ $post->body }}</p>  
            @if($post->image != null)
                <img src="{{ $post->image}}"　width="300" height="200">
            @endif
            <p>{{$post->updated_at}}</p>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script>
            function deletePost(e){
                'use strict';
                if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById("form_delete").submit();
                }
            }
        </script>
    </body>
</html>
@endsection