<!DOCTYPE HTML>
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
       
    {{--  {{dd(\Auth::user()->id)}} --}}

        <form action="/places/store" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="body">
                <h2>名前</h2>
                <input type="type" name="place[name]">
                <textarea name="post[body]" placeholder="今日あった出来事"></textarea>
                <input type="file" name="image">
                <input type="hidden" name="post[user_id]" value={{\Auth::user()->id}} />
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
@endsection