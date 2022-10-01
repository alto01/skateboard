@extends('layouts.app')

@section('content')

<form class = 'm-5' action="/places/store" method="POST" enctype="multipart/form-data" >
    @csrf
  <div class="col-md-5"style="margin:auto">
    <div class="mb-3 pb-3">
      <label for="name" class="form-label">Name</label>
      <input class="form-control" type="text" name="place[name]"　placeholder="Name">
    </div>
      <div class="mb-3 pb-3">
      <label for="adress" class="form-label">Address</label>
      <input class="form-control" type="text" name="place[adress]"　placeholder="Address">
    </div>
    <div class="mb-3 pb-3">
      <label for="image" class="form-label">Image</label><br>
      <input type="file"  name="image">
    </div>
    <div class="mb-3 pb-3">
      <label for="tag" class="sr-only">Tag</label>
      <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="place_tag">          
          <option value="" selected disabled>選択してください</option>
          @foreach($tags as $tag)
              <option value="{{ $tag->name }}">{{ $tag->name }}</option>
          @endforeach
      </select>
    </div>
     
    <input type="hidden" name="place[user_id]" value={{\Auth::user()->id}} />
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

@endsection
