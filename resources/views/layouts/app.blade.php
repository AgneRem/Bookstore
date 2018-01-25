<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<header>
  <div class="topbar text-center" style="background-color:#bcc7ed">
    <small>Reading is a conversation. All books talk. But a good book listens as well.   Mark Haddon</small>
  </div>
  <div class="container">
    <nav>
      <div class="navbar-header" style="margin:20px 0 7px 0; width:1000px">
          <a class="navbar-brand" href="{{ route('home')}}">Home</a>
          <a class="navbar-brand" href="#">About us</a>
          <a class="navbar-brand" href="#">Events</a>
          <a class="navbar-brand" href="#">Books</a>
          <a class="navbar-brand" href="#">Authors</a>
          <a class="navbar-brand" href="#">Email Us</a>
            <form class="navbar-brand" method="GET" action="{{ route('home')}}" class="form-inline" style="padding:0">
                <input type="text" name="s" class="form-control"
                placeholder="Find a book by title or author name"
                style="font-size:15px; width:250px; display:inline"
                value="{{ isset($s) ? $s : ''}}" >
  <button type="submit" class="btn btn-default">Search</button>

            </form>

      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">

          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">

              <!-- Authentication Links -->
              @guest
                  <li><a href="{{ route('login') }}">Login</a></li>
                  <li><a href="{{ route('register') }}">Register</a></li>
              @else
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu">
                        @if (Auth::user()->admin)
                        <li><a href="{{ route('admin')}}">Admin</a></li>
                        @endif
                          <li>
                              <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                      </ul>
                  </li>
              @endguest

          </ul>
      </div>
    </nav>
  </div>
  <div style="background-image:url(http://cdn1.theodysseyonline.com/files/2015/11/29/6358435261906337921174645881_bookcase-wallpaper-background-ideas-photo.jpg); height:90px">

  </div>
</header>

<body style="background-color:#d7a2a233">

          @yield('content')
</body>
<div class="text-center">

      <footer>
        <div class="col-md-12">
          <hr class="divider"> Copyright &COPY; 2017 <a href="#">Bookstore</a>
        </div>
      </footer>
</div>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

</html>
