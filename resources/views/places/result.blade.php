
@extends('layouts.app')

@section('content')

@foreach ($places as $place)
   <div class="card w-50 mb-3" style="margin:auto">
       @if($place->image != null)
            <img src="{{ $place->image}}" class="card-img-top">
        @endif
      <div class="card-body">
        <h5 class="card-title">Name</h5>
        <p class="card-text">{{$place->name}}</p>
        <h5 class="card-title">Address</h5>
        <p class="card-text">{{$place->adress}}</p>
        <a href="/places/{{ $place->id }}"class="btn btn-primary">Go somewhere</a></a>
      </div>
   </div>
@endforeach
@endsection
