@csrf
<div class="md-form">
  <label>パーク名</label>
  <input type="text" name="place[name]" class="form-control" required value="{{ $place->name ?? old('place[name]') }}">
</div>
<div class="md-form">
  <label>住所</label>
  <input type="text" name="place[adress]" class="form-control" required value="{{$place->adress ?? old('place[adress]') }}">
</div>
<div class="md-form">
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="place_tag">          
    <option value="" selected disabled>選択してください</option>
    @foreach($tags as $tag)
        <option value="{{ $tag->name }}">{{ $tag->name }}</option>
    @endforeach
  </select>
</div>
<div class="md-form">
  <label></label>
  <input type="file"  name="image">
</div>

<input type="hidden" name="place[user_id]" value={{\Auth::user()->id}} />