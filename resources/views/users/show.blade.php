@extends('app')

@section('title', $user->name)

@section('content')
  @include('nav')
  <div class="container">
    
    @include('users.user')
    
     @include('users.tabs', ['hasPosts' => true, 'hasLikes' => false ,'hasPlaces' => false])

    @foreach($posts as $post)
      @include('posts.card')
    @endforeach
  </div>
@endsection
