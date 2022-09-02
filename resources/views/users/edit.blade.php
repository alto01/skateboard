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
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/users/{{$user->id}}/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class='user_name'>
                    <h2>ユーザーネーム</h2>
                    <input type='text' name='user[name]' value="{{ $user->name }}">
                </div>
                <div class='user_profile'>
                    <h2>プロフィール</h2>
                    <input type='text' name='user[profile]' value="{{ $user->profile }}">
                </div>
                <div class='user_image'>
                    <h2>プロフィール画像</h2>
                    <input type='file' name='image' value="{{ $user->image}}">
                </div>
                <input type="submit" value="保存">
            </form>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
@endsection