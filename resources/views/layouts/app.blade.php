<!doctype html>
<html lang="{{ $page_locale ?? config('app.locale') }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}@if($page_title ?? false) - {{ $page_title }}@endif</title>

    <!-- Name of web application (only should be used if the website is used as an app) -->
    <meta name="application-name" content="{{ config('app.name') }}">

    <!-- Theme Color for Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#4285f4">

    <!-- Short description of the document (limit to 150 characters) -->
    <meta name="description" content="{{ $page_description ?? __('app.description') }}">
    <meta name="author" content="{{ config('swgoh.CONTACT.USER_NAME') }}">

    <!-- <meta property="fb:app_id" content="123456789"> -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $page_title ?? config('app.name') }}">
    <meta property="og:image" content="{{ $page_image ?? url('/images/logo.png') }}">
    <meta property="og:description" content="{{ $page_description ?? __('app.description') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:locale" content="{{ $page_locale ?? config('app.locale') }}">
    <meta property="article:author" content="{{ config('swgoh.CONTACT.USER_NAME') }}">

    <meta name="twitter:card" content="summary">
    <!-- <meta name="twitter:site" content="@site_account"> -->
    <!-- <meta name="twitter:creator" content="@individual_account"> -->
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $page_title ?? config('app.name') }}">
    <meta name="twitter:description" content="{{ $page_description ??  __('app.description') }}">
    <meta name="twitter:image" content="{{ $page_image ?? url('/images/logo.png') }}">


    <!-- Icon in the highest resolution we need it for 192x192-->
    <link rel="icon" sizes="256x256" href="{{ asset('images/logo.jpg') }}">

    <!-- Apple Touch Icon (reuse 192px icon.png) -->
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <!-- Safari Pinned Tab Icon -->
    <link rel="mask-icon" href="{{ asset('svg/icon.svg') }}" color="blue">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.1.3/css/fork-awesome.min.css"
        integrity="sha256-ZhApazu+kejqTYhMF+1DzNKjIzP7KXu6AzyXcC1gMus=" crossorigin="anonymous">

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
        .anchor {
            /* fix for anchors / bookmarks to not overlap with fixed header */
            display: block;
            height: 4rem;
            /*same height as header*/
            margin-top: -4rem;
            /*same height as header*/
            visibility: hidden;
        }

        .icon-omega {
            background-image: url("{{ asset('images/assets/tex.skill_pentagon_gold.png') }}");
            /* background-position: center center; */
            background-repeat: no-repeat;
            background-size: contain;
            min-width: 16px;
            min-height: 16px;
            display: inline-block;
        }

        .icon-zeta {
            background-image: url("{{ asset('images/assets/tex.skill_zeta.png') }}");
            /* background-position: center center; */
            background-repeat: no-repeat;
            background-size: contain;
            min-width: 16px;
            min-height: 16px;
            display: inline-block;
        }

        div.vertical {
            margin-left: -85px;
            position: absolute;
            width: 215px;
            transform: rotate(-90deg);
            -webkit-transform: rotate(-90deg);
            /* Safari/Chrome */
            -moz-transform: rotate(-90deg);
            /* Firefox */
            -o-transform: rotate(-90deg);
            /* Opera */
            -ms-transform: rotate(-90deg);
            /* IE 9 */
        }

        th.vertical {
            height: 220px;
            line-height: 14px;
            padding-bottom: 20px;
            text-align: left;
        }

        th.rotate {
            /* Something you can count on */
            height: 100px;
            white-space: nowrap;
        }

        th.rotate>div {
            transform:
                /* Magic Numbers */
                translate(25px, 51px)
                /* 45 is really 360 - 45 */
                rotate(315deg);
            width: 30px;
        }

        th.rotate>div>span {
            border-bottom: 1px solid #ccc;
            /* padding: 5px 10px; */
        }

        /* Tooltip container */
        .mytooltip {
            position: relative;
            display: inline-block;
            /* border-bottom: 1px dotted black; If you want dots under the hoverable text */
        }

        /* Tooltip text */
        .mytooltip .mytooltiptext {
            visibility: hidden;
            /* width: 250px; */
            background-color: black;
            color: #fff;
            /* text-align: center; */
            padding: 5px 0;
            border-radius: 6px;

            /* Position the tooltip text - see examples below! */
            position: absolute;
            z-index: 1;


            /* Fade in tooltip - takes 1 second to go from 0% to 100% opac: */
            opacity: 0;
            transition: opacity 1s;

            font-weight: normal;
        }

        /* Tooltip text */
        .mytooltip-fixed .mytooltiptext {
            position: fixed;
            display: flex;
            top: 4rem;
            right: 1rem;
        }

        .mytooltip-left .mytooltiptext {
            top: -5px;
            right: 105%;
        }

        .mytooltip-top .mytooltiptext {
            text-align: center;
            bottom: 100%;
            left: 50%;
            margin-left: -60px;

        }

        /* Tooltip text */
        .mytooltip-no-wrap .mytooltiptext {
            white-space: nowrap;
        }

        /* Show the tooltip text when you mouse over the tooltip container */
        .mytooltip:hover .mytooltiptext {
            visibility: visible;
            opacity: 1;
        }

        .mytooltip-left .mytooltiptext::after {
            content: " ";
            position: absolute;
            top: 50%;
            left: 100%;
            /* To the right of the tooltip */
            margin-top: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: transparent transparent transparent black;
        }

    </style>
    @yield('head')
</head>

<body>
    <div id="app">
        <header>
            @include('layouts._nav')
        </header>

        @if($cols ?? 0 == 2)
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-3 col-xl-2 bd-sidebar">
                    @section('sidebar')

                    @show
                </div>

                <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-3 bd-content" role="main">
                    @section('content')

                    @show
                </main>
            </div>
        </div>
        @else
        @section('content')

        @show
        @endif

        <footer>
            @include('layouts._footer')
        </footer>
        <flash message="{{ session('flash') }}"></flash>
    </div>
    <!-- Optional JavaScript -->
    @stack('scripts-pre')
    @section('scripts-app')
    <script src="{{ asset('js/app.js') }}"></script>
    @show
    @stack('scripts')
</body>

</html>
