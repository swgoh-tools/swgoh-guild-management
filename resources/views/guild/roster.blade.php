@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-3 col-xl-2 bd-sidebar">
            <div class="d-flex">
                <!-- <h1 class="mr-auto">Guildeninfos</h1> -->
                <button class="btn btn-link bd-search-docs-toggle d-md-none p-0 ml-3" type="button" data-toggle="collapse"
                    data-target="#bd-docs-nav" aria-controls="bd-docs-nav" aria-expanded="false" aria-label="Toggle docs navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false">
                        <title>Menu</title>
                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path>
                    </svg>
                </button>
            </div>

            <nav class="collapse bd-links" id="bd-docs-nav">
                <div class="nav flex-column nav-pills" id="sw-tab" role="tablist" aria-orientation="vertical">
                    @foreach ($units as $unit_key => $players)
                    @if ($loop->first)
                    <a class="nav-link active" id="{{ $unit_key }}-tab" data-toggle="pill" href="#{{ $unit_key }}" role="tab"
                        aria-controls="{{ $unit_key }}" aria-selected="true">{{ $unit_key }} ({{ count($players) }})</a>
                    @else
                    <a class="nav-link" id="{{ $unit_key }}-tab" data-toggle="pill" href="#{{ $unit_key }}" role="tab"
                        aria-controls="{{ $unit_key }}" aria-selected="false">{{ $unit_key }} ({{ count($players) }})</a>
                    @endif
                    @endforeach
                </div>
            </nav>
        </div>

        <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
            <h1 class="mr-auto">{{ $title }}</h1>
            <p class="lead text-center">Übersicht aller Toons, die die Mitglieder der <strong>Macht Wächter</strong>
                besitzen.</p>
            <p class="text-center">Das Laden der Seite kann etwas dauern, da alle Charaktere sofort geladen werden. Die Zahl hinter den Bezeichnungen gibt an, wieviele Gildenmitglieder den Charakter besitzen.</p>
            <p class="text-center">Beim Klick auf den Spaltenkopf einer Tabelle wird diese sortierbar und
                durchsuchbar.</p>
            <div class="tab-content" id="toonTabsContent">
                @foreach ($units as $unit_key => $players)
                    <div class="tab-pane fade{{ $loop->first ? ' active show' : ''}}" id="{{ $unit_key }}" role="tabpanel" aria-labelledby="{{ $unit_key }}-tab">
                    <h2>{{ $unit_key }} ({{ count($players) }})</h2>
                    <table class="table table-hover toon-table">
                        <!-- table-striped table-dark  -->

                            @foreach ($players as $player_key => $player)
                            @if ($loop->first)
                            <thead>
                                <tr>
                                    <th>#</th>
                                    @foreach ($player as $key => $value)
                                    <th>{{ __('app.data_keys.' . $key) }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                            @endif
                            <tr>
                                <td>{{ $player_key }}</td>
                                @foreach ($player as $key => $value)
                                    @if ($key == 'updated')
                                        <td>{{ date('D, d M Y', substr($value, 0, 10)) }}</td>
                                    @elseif(is_array($value))
                                        <td>{{ count($value) }}x </td>
                                    @else
                                        <td>{{ $value }}</td>
                                    @endif
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
</div>

@endsection