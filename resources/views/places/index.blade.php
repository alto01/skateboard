@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<h1 class='m-5'>Skateboard Parks</h1>

<form class = 'm-5 ' action="/places/serchKeyword" method="GET" >
    <div class="col-md-5">
        <div class="input-group mb-3 pb-3 col-xs-4">
            <input type="text" class="form-control" name='keyword' placeholder="キーワードを入力">
            <button class="btn btn-outline-success" type="submit" id="button-addon2">Search</button>
        </div>
    </div>
</form>


<form class="form-inline m-5" action="/places/serchPrefecture" method="GET">
    
  <div class="form-group mb-2">
    <label for="staticEmail2" class="sr-only">Prefecture</label>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="keyword[prefecture]"> 
        <option value="" selected disabled>選択してください</option>
        @foreach($prefectures as $prefecture)
            <option value="{{ $prefecture->name }}">{{ $prefecture->name }}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Tag</label>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="keyword[tag]">          
        <option value="" selected disabled>選択してください</option>
        @foreach($tags as $tag)
            <option value="{{ $tag->name }}">{{ $tag->name }}</option>
        @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Search</button>
</form>


@endsection