@extends('app')

@section('title', $user->name . 'の投稿したパーク')

@section('content')
  @include('nav')
  <div class="container">
    
    @include('users.user')
    
    @include('users.tabs', ['hasPosts' => false, 'hasLikes' => false ,'hasPlaces' => true])
    
    @foreach($places as $place)
      @include('places.card')
    @endforeach
  </div>
@endsection
