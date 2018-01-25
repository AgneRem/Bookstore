<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
                MENU
            </button>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">
                Admin
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" method="GET" role="search">
                <div class="form-group">
                    <input type="text" name="q" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('home')}}" target="">Visit Site</a></li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }}
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
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
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid main-container" style="height:500px">
    <div class="col-md-2 sidebar">
        <div class="row">
            <!-- uncomment code for absolute positioning tweek see top comment in css -->
            <div class="absolute-wrapper"> </div>
            <!-- Menu -->
            <div class="side-menu">
                <nav class="navbar navbar-default" role="navigation">
                    <!-- Main Menu -->
                    <div class="side-menu-container">
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('books.index')}}"><i class="fa fa-book" aria-hidden="true"></i> All books</a></li>
                            <li><a href="{{route('books.create')}}"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Create new book</a></li>
                        </ul>

                    </div><!-- /.navbar-collapse -->

                </nav>
                <nav class="navbar navbar-default" role="navigation">
                  <div class="side-menu-container">
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('authors.index')}}"><i class="fa fa-user" aria-hidden="true"></i> Authors</a></li>
                        <li><a href="{{route('authors.create')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Create new author</a></li>
                    </ul>
                  </div>
                </nav>
                <nav class="navbar navbar-default" role="navigation">
                  <div class="side-menu-container">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('reservations.index')}}"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Reservations</a></li>
                    </ul>
                  </div>
                </nav>

            </div>
        </div>
    </div>
    <div class="col-md-8" >
      @yield('content')
    </div>
</div>
