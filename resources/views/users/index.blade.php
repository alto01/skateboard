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
        
        <p class="edit">[<a href="/users/{{ $user->id }}/edit">edit</a>]</p>
        @if(auth()->user()->id !== $user->id)
        
        <follow-component
        :user-id = "{{ json_encode($user->id) }}"
        :default-Followed = "{{ json_encode($defaultFollowed) }}"
        :default-Followed-Count = "{{ json_encode($defaultFollowedCount) }}"
        :default-Follower-Count = "{{ json_encode($defaultFollowerCount) }}"
        ></follow-component>
        @endif
        <div class="content">
            <div class="profile">
                <div class='user_name'>
                    <h2>ユーザーネーム</h2>
                    <h3>{{$user->name}}</h3>
                </div>
                <div class='user_profile'>
                    <h2>プロフィール</h2>
                    <h3>{{$user->profile}}</h3>
                </div>
                <div class='user_image'>
                   @if($user->image != null)
                        <h2>プロフィール画像</h2>
                        <img src="{{ $user->image}}"　width="300" height="200">
                    @endif
                </div>
               

            </div>
            <br><br>
            <div class="posts">
                <h2>--------投稿一覧---------</h2>
                @foreach($user->posts as  $post)
                    <h3>{{$post->body}}</h3>
                    @if($post->image != null)
                        <img src="{{ $post->image}}"　width="300" height="200">
                    @endif
                    <br><br>
                @endforeach
            </div>
            <br><br>
            <div class="place">
                <h2>--------場所投稿---------</h2>
                @foreach($user->places as  $place)
                    <h3>{{$place->name}}</h3>
                    <h3>{{$place->adress}}</h3>
                    @if($place->image != null)
                        <img src="{{ $place->image}}"　width="300" height="200">
                    @endif
                    <br><br>
                @endforeach
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
@endsection