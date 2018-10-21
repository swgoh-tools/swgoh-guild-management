<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.1.3/css/fork-awesome.min.css" integrity="sha256-ZhApazu+kejqTYhMF+1DzNKjIzP7KXu6AzyXcC1gMus=" crossorigin="anonymous">

    <style>
        .result-set { margin-top: 1em }
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
                        @if (Auth::check())
                            @can('view_users')
                                <li class="{{ Request::is('users*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.users.index') }}">
                                        <span class="text-info fa fa-user"></span> Users
                                    </a>
                                </li>
                            @endcan

                            @can('view_posts')
                                <li class="{{ Request::is('posts*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.posts.index') }}">
                                        <span class="text-success fa fa-file-text-o"></span> Posts
                                    </a>
                                </li>
                            @endcan
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else

                            @can('view_roles')
                            <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                                <a href="{{ route('admin.roles.index') }}">
                                    <span class="text-danger fa fa-lock"></span> Roles
                                </a>
                            </li>
                            @endcan

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                    <span class="label label-success">{{ Auth::user()->roles->pluck('name')->first() }}</span>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div id="flash-msg">
                @include('flash::message')
            </div>
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')

    <script>
        $(function () {
            // flash auto hide
            $('#flash-msg .alert').not('.alert-danger, .alert-important').delay(6000).slideUp(500);
        })
    </script>
</body>
</html>
