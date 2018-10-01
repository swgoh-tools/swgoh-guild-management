<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/css/docs.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/trix.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/0.11.1/trix.css"> -->

    <!-- Scripts -->
    <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>

    <title>{{ config('app.name', 'Macht Wächter') }}</title>
    <style>
        html {
        font-size: 0.7rem;
      }
      
      td {
        font-family: monospace;
    }
    header, footer {
        min-height: 4rem;
    }
    #toonTabs .nav-link {
        padding: 0rem 0.5rem;
    }
        body { padding-bottom: 100px; }
        .level { display: flex; align-items: center; }
        .level-item { margin-right: 1em; }
        .flex { flex: 1; }
        .mr-1 { margin-right: 1em; }
        .ml-a { margin-left: auto; }
        [v-cloak] { display: none; }
        .ais-highlight > em { background: yellow; font-style: normal; }
    </style>
    @yield('head')
</head>

<body>
<div id="app">
    @include ('layouts.nav')
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand disabled" href="">Macht Wächter</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('guild.info') }}">Infos <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('guild.squads') }}">Teamsuche</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Vordefinierte Teams
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="?squad=1">Ezradicator</a>
                            <a class="dropdown-item" href="?squad=2">Wampanader</a>
                            <a class="dropdown-item" href="?squad=3">ABC</a>
                            <a class="dropdown-item" href="?squad=4">YOLO SOLO</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('guild.roster') }}">Gesamtliste</a>
                        </div>
                    </li>
                    <!--<li class="nav-item">
              <a class="nav-link disabled" href="#">tbd</a>
            </li>-->
                </ul>
@isset($sync_status)
                <?php
                $output_status[] = "";
            foreach ($sync_status as $key => $value) {
                if (is_array($value)) {
                    // $time = date("F d Y H:i:s.", $value[0]);
                    $time = $value['time'] ?? $value[0] ?? '';
                    $time = $time ? date("d.m H:i", $time) : '';
                    $message = $value['msg'] ?? $value[1] ?? '';
                    $url = $value['url'] ?? '';
                    $tooltip = $value['error'] ?? '';
                    if ($url) {
                        $output_status[] = "<a href=\"$url\" data-toggle=\"tooltip\" data-html=\"true\" title=\"<em>$tooltip</em>\">$key</a> ($time $message)";
                    } else {
                        $output_status[] = "<span data-toggle=\"tooltip\" data-html=\"true\" title=\"<em>$tooltip</em>\">$key ($time $message)</span>";
                    }
                } else {
                    $output_status[] = "$key ($value)";
                }
            }
            // if (! empty($output_status)) {
                echo "<span class=\"navbar-text ml-auto\"> " . implode(', ', $output_status) . " </span>";
            // }
            ?>
@endisset
                <form class="form-inline my-2 my-lg-0" action="" method="post">
                    @csrf
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="sync">Sync</button>
                </form>
                <!--<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>-->
          @if (Route::has('login'))
                <div class="navbar-nav">
                    @auth
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">Login</a>

                        @if (Request::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </nav>
    </header>

@section('content')

@show

    <footer>
        <nav class="navbar fixed-bottom justify-content-center navbar-expand-lg navbar-dark bg-dark">
            <span class="navbar-text mr-auto">
                2018
            </span>
            <div class="navbar-nav" style="flex-direction: row;">
                <!-- <span class="navbar-brand mx-0">2018</span>
                <span class="navbar-brand mx-4">|</span> -->
                <span class="navbar-brand mx-1 mx-lg-0">VKSG</span>
                <a class="nav-link" href="https://swgoh.gg/u/vksg/">swgoh.gg</a>
                <span class="navbar-brand mx-1 mx-lg-4">|</span>
                <span class="navbar-brand mx-1 mx-lg-0">Macht Wächter</span>
                <a class="nav-link" href="https://swgoh.gg/g/17401/macht-wachter/">swgoh.gg</a>
            </div>
            <span class="navbar-text ml-auto">
                Not affiliated with EA, Capital Games, StarWars or the like.
            </span>
        </nav>
    </footer>
    <flash message="{{ session('flash') }}"></flash>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('table.squad-table').DataTable({
                "paging": false,
                "ordering": true,
                "info": false,
                "order": [[2, "desc"]]
            });
            $('thead').on('click', function () {
                var table = $(this).parent('table');
                if (table.hasClass('toon-table') && !table.hasClass('datatable')) {
                    table.DataTable();
                }
            });
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        });
    </script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>

</html>