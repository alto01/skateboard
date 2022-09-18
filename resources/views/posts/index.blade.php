
@extends('layouts.app')

@section('content')
<div class='posts'>
    @foreach ($posts as $post)
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
</div>

<div class='paginate'>
{{ $posts->links() }}
</div>
@endsection
