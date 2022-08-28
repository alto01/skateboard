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
        <div>
            <form action="/places/serch" method="GET">
                <input type="text" name="keyword" >
                <input type="submit" value="検索">
            </form>
            
            <form action="/places/serch" method="GET">
                <select name="keyword">                          
                    @foreach($prefectures as $prefecture)
                        <option value="{{ $prefecture->name }}">{{ $prefecture->name }}</option>
                    @endforeach
                </select>
                <input type="submit" value="検索">
            </form>
            [<a href='/places/create'>create</a>]
            
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
@endsection