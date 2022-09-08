@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Place</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <div class="content">
            <div class="content_place">
                <h3>{{$place->user->name}}</h3>
                <p>{{ $place->name }}</p> 
                <p id='adress'>{{ $place->adress }}</p>
                
                @if($place->image != null)
                    <img src="{{ $place->image}}"　width="300" height="200">
                @endif
                <p>{{$place->updated_at}}</p>
                <div id="map" style="height:500px"> 
                    <script src="{{ asset('/js/map_result.js') }}"></script> 
                    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{config('services.google.key')}}&callback=initMap" async defer>
    	            </script>
    	 
	            </div>
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
@endsection