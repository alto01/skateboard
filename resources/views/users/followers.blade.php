@extends('app')

@section('title', $user->name . 'のフォロワー')

@section('content')
  @include('nav')
  <div class="container">
    @include('users.user')
    @include('users.tabs', ['hasPosts' => false, 'hasLikes' => false,'hasPlaces' => false])
    @foreach($followers as $person)
      @include('users.person')
    @endforeach
  </div>
@endsection
