<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BlueRescue</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >

    <style>
        body {
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <header>
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/BlueRescuefav_white_notag.png')}}" />
            <img src="{{ asset('img/BlueRescueLogoName.png') }}" />
        </a>

        <nav class="navbar navbar-default">
            <div class="header-links">
                @if (Auth::guest())
                    <a class="btn btn-primary navbar-btn btn-lg" href="{{ route('login') }}">Login</a>
                @else
                    <a class="btn btn-primary navbar-btn btn-lg" href="{{ url('/') }}">
                        </i>Home
                    </a>
                    @if (Auth::user())
                    <a class="btn btn-primary navbar-btn btn-lg" href="{{ url('dispatch') }}">
                        </i>Dispatch Feed
                    </a>
                    @endif
                    @if (Auth::user()->isAdmin)
                    <a class="btn btn-primary navbar-btn btn-lg" href="{{ url('admin') }}">
                        </i>Admin Menu
                    </a>
                    <a class="btn btn-primary navbar-btn btn-lg" href="{{ route('register') }}">Add User</a>                    
                    @endif                    
                    @if (Auth::user())
                    <a class="btn btn-primary navbar-btn btn-lg" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    @endif
                @endif
            </div>
        </nav>
    </header>

    <div class="page">
    @yield('content')
    </div>

    <footer>
        <a class="footer-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/BlueRescuefav_white.png')}}" />
        </a>
    </footer>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>