@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')


<div class="content">
    <div class="card w-50 mb-3" style="margin:auto">
      <div class="card-body">
          
        <h5 class="card-title" style='font-size:2rem'>
            <img class='icon' src="{{ $user->image}}">
            {{$user->name}}
             @if(auth()->user()->id === $user->id)
                <button type="submit"  class="btn btn-outline-info float-right" onclick="location.href='/users/{{ $user->id }}/edit'">edit</button>
             @endif
        </h5>
        <p class="ml-5" style='font-size:1rem'>{{$user->updated_at}}</p>
        @if(auth()->user()->id !== $user->id)
            <follow-component
            :user-id = "{{ json_encode($user->id) }}"
            :default-Followed = "{{ json_encode($defaultFollowed) }}"
            :default-Followed-Count = "{{ json_encode($defaultFollowedCount) }}"
            :default-Follower-Count = "{{ json_encode($defaultFollowerCount) }}"
            ></follow-component>
        @else
           <span class='ml-5'>{{$defaultFollowerCount}}&emsp;Following</span>
           <span class='ml-5'>{{$defaultFollowerCount}}&emsp;Followers</span>
        @endif
      </div>
      <ul class="list-group list-group-flush ml-5">
        <li class="list-group-item" style='font-size:1rem'>{{ $user->profile }}</li>
      </ul>
    </div>
    
    @foreach ($user->posts as $post)
       <div class="card w-50 mb-3" style="margin:auto">
           @if($post->image != null)
                <img src="{{ $post->image}}" class="card-img-top">
            @endif
          <div class="card-body">
            <h5 class="card-title" style='font-size:2rem'>
               <a href="/users/{{ $post->user->id }}"　style="text-decoration:none;color:black" >{{ $post->user->name }}</a>
               <span class='ml-3' style="font-size:1rem">{{$post->updated_at}}</span>
            </h5>
    
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item" style='font-size:3rem'><a href="/posts/{{ $post->id }}" style='text-decoration:none; color:black' >{{ $post->body }}</a></li>
          </ul>
          <div class="card-body">
                @if($post->is_liked_by_auth_user())
                <a href="/posts/{{$post->id}}/unlike" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                @else
                <a href="posts/{{$post->id}}/like" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                @endif
          </div>
        </div>
    @endforeach
@endsection