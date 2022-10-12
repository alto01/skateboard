
@extends('app')

@section('title', 'パーク検索結果')

@section('content')
    @include('nav')
    <div class="container">
        @foreach ($places as $place)
          
          @include('places.card')
          
        @endforeach
    </div>
@endsection
