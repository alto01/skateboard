<div class="card mt-3">
  <div class="card-body d-flex flex-row">

    @if( Auth::id() === $place->user_id )
    <!-- dropdown -->
      <div class="ml-auto card-text">
        <div class="dropdown">
          <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route("places.edit", ['place' => $place]) }}">
              <i class="fas fa-pen mr-1"></i>投稿を更新する
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $place->id }}">
              <i class="fas fa-trash-alt mr-1"></i>投稿を削除する
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
    <div class="card-body pt-0 pb-2 pl-3">
        <h5 class="card-title">Name</h5>
        <p class="card-text">{{$place->name}}</p>
        <h5 class="card-title">Address</h5>
        <p class="card-text">{{$place->adress}}</p>
        <a href="/places/{{ $place->id }}"class="btn btn-primary">詳細はこちら</a></a>
    </div>
  </div>
</div>
