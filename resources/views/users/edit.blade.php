@extends('app')

@section('title', 'プロフィール更新')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_card_list')
            <div class="card-text">
              <form method="POST" action="{{ route('users.update', ['name' => $user->name]) }}">
                @method('PUT')
                @csrf
                <div class="md-form">
                  <label>名前</label>
                  <input type="text" name="user[name]" class="form-control" required value="{{ $user->name ?? old('user[name]') }}">
                </div>
                <div class="md-form">
                  <label>プロフィール</label>
                  <input type="text" name="user[profile]" class="form-control" required value="{{$user->profile ?? old('user[profile]') }}">
                </div>
                <div class="md-form">
                  <label></label>
                  <input type="file"  name="image">
                </div>
                <button type="submit" class="btn blue-gradient btn-block">更新する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection