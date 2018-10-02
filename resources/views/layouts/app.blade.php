<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{ url('/css/docs.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/trix.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"></script> -->

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
        /* html {
        font-size: 0.7rem;
      } */

        td {
            font-family: monospace;
        }

        .table-sm {
            font-size: 0.7rem;
        }

        .table-sm .btn-sm {
            padding: 0.25rem 0.1rem;
            font-size: 0.7rem;
            line-height: 1.0;
            border-radius: 0.2rem;
        }

        /* .form-control {
            font-size: 0.7rem;
        } */

        header,
        footer {
            min-height: 4rem;
        }

        /* main, .bd-content {
            top: 4rem;
            position: relative;
        } */

        .bd-sidebar, .bd-toc {
            top: 0rem;
        }

        #toonTabs .nav-link {
            padding: 0rem 0.5rem;
        }

        body {
            padding-bottom: 100px;
        }

        /* .level {
            display: flex;
            align-items: center;
        } */

        /* .level-item {
            margin-right: 1em;
        } */

        /* .flex {
            flex: 1;
        } */

        .mr-1 {
            margin-right: 1em;
        }

        .ml-a {
            margin-left: auto;
        }

        /* [v-cloak] {
            display: none;
        } */

        .ais-highlight>em {
            background: yellow;
            font-style: normal;
        }
        div.ais-index {
            display: flex;
            width: 100%;
        }
    </style>
    @yield('head')
</head>

<body>
    <div id="app">
        <header>
            @include ('layouts.nav')
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
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script> -->
    <script src="{{ asset('js/app.js') }}"></script>
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
    @yield('scripts')
</body>

</html>