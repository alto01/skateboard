
@extends('layouts.app')

@section('content')
<div class='posts'>
    @foreach ($posts as $post)
       <div class="card w-50 " style="margin:auto">
          <div class="card-body">
            <h5 class="card-title" style='font-size:2rem'>
                <img class='post_icon' src="{{ $post->user->image}}">
               <a href="/users/{{ $post->user->id }}"　style="text-decoration:none;color:black" >{{ $post->user->name }}</a>
               <span class='ml-3' style="font-size:1rem">{{$post->updated_at}}</span>
            </h5>
          </div>
          @if($post->image != null)
                <img src="{{ $post->image}}" class="card-img-top">
            @endif
          <ul class="list-group list-group-flush">
            <li class="list-group-item" style='font-size:2rem'><a href="/posts/{{ $post->id }}" style='text-decoration:none; color:black' >{{ $post->body }}</a></li>
          </ul>
          <div class="card-body">

                    <div class="row justify-content-center">
                        <like-component
                            :post="{{ json_encode($post)}}"
                        ></like-component>
                    </div>
          </div>
        </div>
    @endforeach
</div>

<div class='paginate'>
{{ $posts->links() }}
</div>
@endsection
