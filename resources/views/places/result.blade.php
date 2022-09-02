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
     
        <div class='posts'>
            @foreach ($places as $place)
                <div class='place'>
                    <p class='prefecture'>{{$place->prefecture}}</p>
                    <a href="/places/{{ $place->id }}">{{$place->name}}</a>
                    <p class='adress'>{{$place->adress}}</p>
                    @if($place->image != null)
                        <img src="{{ $place->image}}"　width="300" height="200">
                    @endif
                </div>
            @endforeach
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
@endsection