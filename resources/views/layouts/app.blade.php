<!doctype html>
<html lang="{{ $page_locale ?? config('app.locale') }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title ?? config('app.name') }}</title>

    <!-- Name of web application (only should be used if the website is used as an app) -->
    <meta name="application-name" content="{{ config('app.name') }}">

    <!-- Theme Color for Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#4285f4">

    <!-- Short description of the document (limit to 150 characters) -->
    <meta name="description" content="{{ __('app.description', ['name' => $page_guild ?? '']) }}">
    <meta name="author" content="{{ config('swgoh.CONTACT.USER_NAME') }}">

    <!-- <meta property="fb:app_id" content="123456789"> -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $page_title ?? config('app.name') }}">
    <meta property="og:image" content="{{ url('/images/logo.png') }}">
    <meta property="og:description" content="{{ __('app.description', ['name' => $page_guild ?? '']) }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:locale" content="{{ $page_locale ?? config('app.locale') }}">
    <meta property="article:author" content="{{ config('swgoh.CONTACT.USER_NAME') }}">

    <meta name="twitter:card" content="summary">
    <!-- <meta name="twitter:site" content="@site_account"> -->
    <!-- <meta name="twitter:creator" content="@individual_account"> -->
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $page_title ?? config('app.name') }}">
    <meta name="twitter:description" content="{{ __('app.description', ['name' => $page_guild ?? '']) }}">
    <meta name="twitter:image" content="{{ url('/images/logo.png') }}">


    <!-- Icon in the highest resolution we need it for 192x192-->
    <link rel="icon" sizes="256x256" href="{{ asset('images/logo.jpg') }}">

    <!-- Apple Touch Icon (reuse 192px icon.png) -->
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <!-- Safari Pinned Tab Icon -->
    <link rel="mask-icon" href="{{ asset('svg/icon.svg') }}" color="blue">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.1.3/css/fork-awesome.min.css" integrity="sha256-ZhApazu+kejqTYhMF+1DzNKjIzP7KXu6AzyXcC1gMus=" crossorigin="anonymous">

    @stack('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>

    <!-- Styles -->
    <style>

    </style>
    @yield('head')
</head>

<body>
    <div id="app">
        <header>
            @include('layouts.nav')
        </header>

        @section('content')

        @show

        <footer>
            <nav class="navbar fixed-bottom justify-content-center navbar-expand-lg navbar-dark bg-dark">
                <span class="navbar-text mr-auto">
                    {{ config('app.year') }}
                    <small>{{ config('app.version') ? ' v'.config('app.version') : '' }}</small>
                    <small>
                        (
                        <a class="text-lowercase" href="{{ url()->current() }}?lang=en">{{ ($page_locale ?? config('app.locale')) == 'en' ? ' .:en:. ' : 'en' }}</a>
                        |
                        <a class="text-lowercase" href="{{ url()->current() }}?lang=de">{{ ($page_locale ?? config('app.locale')) == 'de' ? ' .:de:. ' : 'de' }}</a>
                        )
                        {{ '>> '.$page_guild ?? '' }}
                    </small>
                </span>
                <div class="navbar-nav" style="flex-direction: row;">
                    <span class="navbar-brand mx-1 mx-lg-0">{{ config('swgoh.CONTACT.USER_NAME') }}</span>
                    <a class="nav-link text-lowercase" href="{{ route('contact') }}">{{ __('Contact') }}</a>
                    <span class="nav-link">|</span>
                    <a class="nav-link text-lowercase" href="{{ route('home') }}">{{ __('Home') }}</a>
                </div>
                <span class="navbar-text ml-auto">
                    <small>{{ __('app.disclaimer') }}</small>
                </span>
            </nav>
        </footer>
        <flash message="{{ session('flash') }}"></flash>
    </div>
    <!-- Optional JavaScript -->
    @section('scripts-app')
    <script src="{{ asset('js/app.js') }}"></script>
    @show
    @stack('scripts')
</body>

</html>
