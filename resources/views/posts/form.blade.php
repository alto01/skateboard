@csrf
<div class="form-group">
  <label></label>
  {{--記事投稿の場合と記事編集の場合でoldを使い分ける--}}
  <textarea name="post[body]" required class="form-control" rows="16" placeholder="本文">{{ $post->body ?? old('post[body]') }}</textarea>
</div>
<div class="form-group">
  <label></label>
    <input type="file"  name="image">
</div>
<input type="hidden" name="post[user_id]" value={{\Auth::user()->id}} />