@extends('app')

@section('title', 'スケートパーク')

@section('content')
    @include('nav')
    <div class='d-flex align-items-center justify-content-center mt-5'>
        <div class="card " style="width: 40rem;">
          <div class="card-body">
            <h4 class="card-title text-center">
                検索結果0件<br>
                条件を変えて検索し直してください。
            </h4>
            <div class='text-center'>
                <a href="/places" class="btn btn-primary center-block">戻る</a>
            </div>
          </div>
        </div>
    </div>
@endsection
