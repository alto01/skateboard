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
                <div class='place_name'>
                    <h2>名前</h2>
                    <input type="text" name="place[name]"　placeholder="名前">
                </div>
                <div class='place_prefecture'>
                    <h2>県名</h2>
                    <select name="place_prefecture">                          
                        @foreach($prefectures as $prefecture)
                            <option value="{{ $prefecture->name }}">{{ $prefecture->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class='place_adress'>
                    <h2>住所</h2>
                     <input type="text" name="place[adress]" placeholder="住所">
                </div>
                <div class='placce_image'>
                    <h2>画像</h2>
                    <input type="file" name="image">
                </div>
                <div class='place_tag'>
                    <h2>タグ</h2>
                    <select name="place_tag">                          
                        @foreach($tags as $tag)
                            <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="place[user_id]" value={{\Auth::user()->id}} />
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
@endsection