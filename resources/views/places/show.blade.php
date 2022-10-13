
    
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>
    @yield('title')
  </title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
</head>

<body>
  <div id="app">
    @include('nav')
    <div class="container">
        <div class="card mt-3">
         <div class="card-body d-flex flex-row">
            <h5 class="font-weight-bold ml-3">
                {{ $place->name }}
              </h5> 
          @if( Auth::id() === $place->user_id )
            <!-- dropdown -->
              <div class="ml-auto card-text">
                <div class="dropdown">
                  <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route("places.edit", ['place' => $place]) }}">
                      <i class="fas fa-pen mr-1"></i>記事を更新する
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $place->id }}">
                      <i class="fas fa-trash-alt mr-1"></i>記事を削除する
                    </a>
                  </div>
                </div>
              </div>
              <!-- dropdown -->
        
              <!-- modal -->
              <div id="modal-delete-{{ $place->id }}" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="POST" action="{{ route('places.delete', ['place' => $place]) }}">
                      @csrf
                      @method('DELETE')
                      <div class="modal-body">
                        この投稿を削除します。よろしいですか？
                      </div>
                      <div class="modal-footer justify-content-between">
                        <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                        <button type="submit" class="btn btn-danger">削除する</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- modal -->
            @endif
        
          </div>

            <div class="card-body pt-0">
                @if($place->image != null)
                    <img src="{{ $place->image}}" class="card-img-top">
                @endif

          <ul class="list-group list-group-flush">
            <li id='adress' class="list-group-item">{{$place->adress}}</li>
            <li class="list-group-item">投稿者　：　<span class="font-weight-bold　lead">
                <a href="{{ route('users.show', ['name' => $place->user->name]) }}" class="text-dark">
                  {{$place->user->name}}
                </a>
            </span></li>
          </ul>
            <div id="map" style="height:500px"> 
               
    
            </div>
        </div>
        </div>
     </div>
  
  </div>

  <script src="{{ mix('js/app.js') }}"></script>
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>
    <script src="{{ asset('/js/map_result.js') }}" ></script> 
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{env('GOOGLEMAP_API_KEY')}}&callback=initMap" async defer>
    </script>
    
    
</body>
 
</html>
