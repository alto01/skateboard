
@extends('app')

@section('title', 'パーク投稿')

@include('nav')

@section('content')
  <div class="container">
    
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
          <!--エラーのバリデーションをインクルード-->
            <div class="card-text">
              <form method="POST" action="{{ route('places.store') }} " enctype="multipart/form-data">
                @include('places.form')
                <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
