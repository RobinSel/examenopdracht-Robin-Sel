<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

    </head>
    <body>
        <div class="page">
          <div class="header">
            <div class="navigationLeft">
              <ul>
                <li><a href="{{ url('/') }}">Hackernews.local</a></li>
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/article/add') }}">Add article</a></li>
                <li><a href="{{ url('/intructies') }}">Instructies</a></li>
              </ul>
            </div>
            <div class="navigationRight">
              <ul>
              @if (Route::has('login'))
                      @auth
                        <li><a href="{{ url('/home') }}">Home</a></li>
                      @else
                          <li><a href="{{ route('login') }}">Login</a></li>
                          <li><a href="{{ route('register') }}">Register</a></li>
                      @endauth
              @endif
              </ul>
            </div>
          </div>
          <div class="content">
            @yield('content')
          </div>

        </div>
    </body>
</html>
