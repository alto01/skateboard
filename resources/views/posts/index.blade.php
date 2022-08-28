<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
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
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
@endsection
