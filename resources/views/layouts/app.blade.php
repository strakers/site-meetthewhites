<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style type="text/css">
        .side-panel li {
            padding: 0;
        }
        .side-panel li a {
            padding: 10px 15px;
            display: block;
            text-decoration: none;
        }
        .side-panel li a:hover,
        .side-panel li a:focus,
        .side-panel li a.active {
            background-color: #f5f5f5;
        }

        .side-menu-toggle-btn {
            color: #000;
            padding: 0;
            text-decoration: none !important;
            outline: none;
        }

        .side-panel.collapsed .side-menu-label {
            display: none;
        }

        .deleted {
            font-style: italic;
            text-decoration: line-through;
        }
        .embed {
            position: relative;
            padding-bottom: 75%; // This is the aspect ratio
        height: 0;
            overflow: hidden;
        }
        .embed iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100% !important;
            height: 100% !important;
        }

        .required-field {
            color: #c00 !important;
        }

        .col-md-1-aug {

        }
        @media (min-width: 1200px) {
            .col-md-1-aug {
                width: 7%;
            }
        }

    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            @if( session('guest') )
                                <li><a href="{{ url('/guest/logout') }}">Guest Logout</a></li>
                            @else
                                <li><a href="{{ url('/guest') }}">Guest</a></li>
                            @endif
                            <li><a href="{{ route('login') }}">Admin Login</a></li>

                            @if(config('allow_register', false))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

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
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function($){
            $('.side-menu-toggle-btn').on('click',function(){
                var $me = $(this), $container = $me.parents('.side-panel'), $icon = $me.find('.fa').first(), $view = $('#main_view');
                $container.toggleClass('collapsed col-md-3 col-md-1 col-md-1-aug');
                $icon.toggleClass('fa-caret-left fa-caret-right');
                $view.toggleClass('col-md-9 col-md-11');
            });

            $('.delete-btn').on('click',function(e){
                var decision = confirm('Are you sure you want to remove this record?');
                return decision;
            });
        })(jQuery)
    </script>
</body>
</html>
