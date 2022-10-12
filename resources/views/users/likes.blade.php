@extends('app')

@section('title', $user->name . 'のいいねした記事')

@section('content')
  @include('nav')
  <div class="container">
    
    @include('users.user')
    
    @include('users.tabs', ['hasPosts' => false, 'hasLikes' => true ,'hasPlaces' => false])
    
    @foreach($posts as $post)
      @include('posts.card')
    @endforeach
  </div>
@endsection
