@extends('layouts.app')　　　　　　　　　　　　　　　　　　


@section('content')
@endsection
@section('script')
    <script src="{{ asset('/js/map_result.js') }}" ></script> 
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{env('GOOGLEMAP_API_KEY')}}&callback=initMap" async defer>
    </script>
@endsection
@section('map')
    
    <div class="card w-50 mb-3" style="margin:auto">
        @if($place->image != null)
            <img src="{{ $place->image}}" class="card-img-top">
        @endif
      <ul class="list-group list-group-flush">
        <li class="list-group-item">{{ $place->name }}</li>
        <li id='adress' class="list-group-item">{{$place->adress}}</li>
        <li class="list-group-item">Contributor　：　<span class="font-weight-bold　lead">{{$place->user->name}}</span></li>
      </ul>
        <div id="map" style="height:500px"> 
           
        </div>
    </div>

@endsection
    

