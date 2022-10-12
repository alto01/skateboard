@extends('app')

@section('title', 'スケートパーク')

@section('content')
    @include('nav')
    <div class="container">

        <form class = "input-group mt-5" action="/places/serchKeyword" method="GET" >
            <div class="input-group mb-3 pb-3 col-xs-4">
                <input type="text" class="form-control" name='keyword' placeholder="キーワードを入力">
                <button  type="submit" class="btn btn-primary mb-2" type="submit" >Search</button>
            </div>
        </form>
                

        
        <form action="/places/serchPrefecture" method="GET">
          <div class="form-row align-items-center">
            <div class="col-auto">
                <select id="select1a" class="form-control"name="keyword[prefecture]">
                    <option value=''>選択なし</option>
                    @foreach($prefectures as $prefecture)
                        <option value="{{ $prefecture->name }}">{{ $prefecture->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <select id="select1a" class="form-control"name="keyword[tag]">
                    <option value=''>選択なし</option>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </div>
          </div>
        </form>
    </div>

@endsection
