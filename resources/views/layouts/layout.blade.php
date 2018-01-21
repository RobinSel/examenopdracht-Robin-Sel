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
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/article/add') }}">Add article</a></li>
              </ul>
            </div>
            <div class="navigationRight">
              @guest
                  <li><a href="{{ route('login') }}">Login</a></li>
                  <li><a href="{{ route('register') }}">Register</a></li>
              @else
                  <li class="logout">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>
                      <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                  </li>
              @endguest
            </div>
          </div>
          <div class="content">
            @yield('content')
          </div>

        </div>
    </body>
</html>
