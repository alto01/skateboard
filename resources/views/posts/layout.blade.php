<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="{{asset('/css/index.css')}}">
        <!-- CSS only -->
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    </head>
    <body>
        <header id='main_header'>header</header>
        <div class='content'>
            <nav>
                <div class="sidebar">
                    <p>Menu</p>
                    <ul>
                        <li>
                          <a href="/"><i class="fas fa-qrcode"></i>Home</a>
                        </li>
                        <li>
                          <a href="/users/{{auth()->user()->id}}"><i class="fas fa-link"></i>Profile</a>
                        </li>
                        <li>
                          <a href="/places"><i class="fas fa-coffee"></i>Place</i></a>
                        </li>
                        <li>
                          <a href="#"><i class="fas fa-calendar-week"></i>Trick</i></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main>
                <div class='posts'>
                    @foreach ($posts as $post)
                        <div class='post'>
                            
                            <a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a>
                            <p class='uptime'>{{$post->updated_at}}</p>
                            <h2 class='body'>
                                <a href="/posts/{{ $post->id }}">{{ $post->body }}</a>
                            </h2>
                            @if($post->image != null)
                                <img src="{{ $post->image}}"　width="300" height="200">
                            @endif
                            <br>
                            <div class = 'like'>
                                @if($post->is_liked_by_auth_user())
                                <a href="/posts/{{$post->id}}/unlike" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                                @else
                                <a href="posts/{{$post->id}}/like" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <button type="button" class="btn btn-primary">Primary</button>
                </div>
            </main>
            <aside>right</aside>
        </div>
        <footer>footer</footer>
    </body>
</html>