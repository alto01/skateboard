<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/index.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-4 sticky-top">
          <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}" style='font-size:3rem'>Skateboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                @guest
                  <ul class="navbar-nav">
                    <li class="nav-item ml-3">
                        <a class="nav-link" href="{{ route('login') }}"style="font-size:2rem">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item ml-3">
                            <a class="nav-link" href="{{ route('register') }}" style="font-size:2rem">{{ __('Register') }}</a>
                        </li>
                    @endif
                  </ul>
                @else
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link active ml-5" aria-current="page" href="{{ url('/') }}" style="font-size:2rem">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link  ml-3" href="/places" style="font-size:2rem">Place</a>
                    </li>
                    <li class="nav-item ml-3">
                      <a class="nav-link" href="/users/ {{ Auth::user()->id }}" style="font-size:2rem">Profile</a>
                    </li>
                    <li class="nav-item dropdown ml-3">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:2rem">
                        Create Post!!
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/posts/create">Post</a></li>
                        <li><a class="dropdown-item" href="/places/create">Place</a></li>
                      </ul>
                    </li>
                  </ul>
                  <ul class="navbar-nav mr-5">
                    <li class="nav-item dropdown text-right">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="font-size:2rem">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
    
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                  </ul> 
                @endguest
            </div>
          </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
      @yield('script') 
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    @yield('map') 
</body>
</html>


