<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>post</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class = 'wrap'>
            <h1 class='title'>Blog Name</h1>
            [<a href='/posts/create'>create</a>]
            [<a href='/places'>places</a>]
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post'>
                        <a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a>
                        <p class='uptime'>{{$post->updated_at}}</p>
                        <h2 class='body'>
                            <a href="/posts/{{ $post->id }}">{{ $post->body }}</a>
                        </h2>
                        @if($post->image != null)
                            <img src="{{ $post->image}}"　width="300" height="200">
                        @endif
                        <br>
                        <div class = 'like'>
                            @if($post->is_liked_by_auth_user())
                            <a href="/posts/{{$post->id}}/unlike" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                            @else
                            <a href="posts/{{$post->id}}/like" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
@endsection
