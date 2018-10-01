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

        <!--
        <div class="d-none d-xl-block col-xl-2 bd-toc">
            <ul class="section-nav">
            <li class="toc-entry toc-h2"><a href="#containers">Containers</a></li>
            <li class="toc-entry toc-h2"><a href="#responsive-breakpoints">Responsive breakpoints</a></li>
            <li class="toc-entry toc-h2"><a href="#z-index">Z-index</a></li>
            </ul>
        </div>
-->

        <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
            <h1 class="mr-auto">{{ $title }}</h1>
            <p class="lead text-center">Übersicht aller Toons, die die Mitglieder der <strong>Macht Wächter</strong>
                besitzen.</p>
            <p class="lead text-center">Beim Klick auf den Spaltenkopf einer Tabelle wird diese sortierbar und
                durchsuchbar.</p>
            <div class="tab-content" id="toonTabsContent">
                @foreach ($units as $unit_key => $players)
                    @if ($loop->first)
                    <div class="tab-pane fade active show" id="{{ $unit_key }}" role="tabpanel" aria-labelledby="{{ $unit_key }}-tab">
                    @else
                    <div class="tab-pane fade" id="{{ $unit_key }}" role="tabpanel" aria-labelledby="{{ $unit_key }}-tab">
                    @endif
                    <h2>{{ $unit_key }} ({{ count($players) }})</h2>
                    <table class="table table-hover toon-table">
                        <!-- table-striped table-dark  -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Time</th>
                                <th>Player</th>
                                <th>Ally Code</th>
                                <th>Stars</th>
                                <th>Level</th>
                                <th>Gear Level</th>
                                <th>Gear Pieces</th>
                                <th>Zetas</th>
                                <th>Type</th>
                                <th>Power</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($players as $player_key => $player)
                            <tr>
                                <td>{{ $player_key }}</td>
                                @foreach ($player as $key => $value)
                                <?php
        // $roster[$player['allyCode']] = $player['player']; // was id
        // $player_data[$player['allyCode']][$unit_key] = $player; // was id
            $value_count = '';
            if ($key == 'updated') {
                $value = date('D, d M Y', substr($value, 0, 10));
            }
            if (is_array($value)) {
                $value_count = count($value);
                $value = implode('; ', $value);
                // $output_all .= "<td>$value_count</td>";
            }
            ?>
                                <td>{{ $value }}</td>
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

    @endsection