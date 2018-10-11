@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <main>
        <p class="lead text-center">Übersicht aller Toons, die die Mitglieder der <strong>Macht Wächter</strong>
            besitzen.</p>
        <p class="lead text-center">Beim Klick auf den Spaltenkopf einer Tabelle wird diese sortierbar und
            durchsuchbar.</p>
        <ul class="nav nav-pills" id="toonTabs" role="tablist">
            @foreach ($units as $unit_key => $players)
            <li class="nav-item">
                <a class="nav-link" id="{{ $unit_key }}-tab" data-toggle="tab" href="#{{ $unit_key }}" role="tab"
                    aria-controls="{{ $unit_key }}" aria-selected="false">{{ $unit_key }} ({{ count($players) }})</a>
            </li>
            @endforeach
        </ul>
        <div class="tab-content" id="toonTabsContent">
            @foreach ($units as $unit_key => $players)
            <div class="tab-pane fade" id="{{ $unit_key }}" role="tabpanel" aria-labelledby="{{ $unit_key }}-tab">
                <h1>{{ $unit_key }} ({{ count($players) }})</h1>
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