@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<form action="/users/{{$user->id}}/update" method="POST" enctype="multipart/form-data">
     @csrf
     @method('PUT')
  <div class="mb-3">
    <label for="Name" class="form-label">Name</label>
    <input type="text" class="form-control" id="Name" name='user[name]' value="{{ $user->name }}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Profile</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name='user[profile]' value="{{ $user->profile }}" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Profile Image</label><br>
    <input type='file' name='image' value="{{ $user->image}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection