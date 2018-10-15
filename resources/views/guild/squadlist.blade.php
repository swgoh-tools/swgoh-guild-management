@extends('layouts.app')

@include('layouts.cdn._datatables')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-3 col-xl-2 bd-sidebar">
            <div class="d-flex">
                <!-- <h1 class="mr-auto">Guildeninfos</h1> -->
                <button class="btn btn-link bd-search-docs-toggle d-md-none p-0 ml-3" type="button" data-toggle="collapse"
                    data-target="#bd-docs-nav" aria-controls="bd-docs-nav" aria-expanded="false" aria-label="Toggle docs navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false">
                        <title>{{ __('Menu') }}</title>
                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path>
                    </svg>
                </button>
            </div>

            <nav class="collapse bd-links" id="bd-docs-nav">
                <div class="nav flex-column nav-pills" id="sw-tab" role="tablist" aria-orientation="vertical">
                    @forelse ($list ?? [] as $key => $section)
                    @if ($loop->first)
                    <a class="nav-link active" id="{{ $key }}-tab" data-toggle="pill" href="#{{ $key }}" role="tab"
                        aria-controls="{{ $key }}" aria-selected="true">{{ ucwords($key) }}</a>
                    @else
                    <a class="nav-link" id="{{ $key }}-tab" data-toggle="pill" href="#{{ $key }}" role="tab"
                        aria-controls="{{ $key }}" aria-selected="false">{{ ucwords($key) }}</a>
                    @endif
                    @empty
                    <!-- no entries -->
                    @endforelse
                </div>
            </nav>
        </div>

        <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
            <h1 class="mr-auto">{{ $title }}</h1>
            <p class="text-left">Die Spielergemeinschaft hat eine Liste von Teams zusammengetragen, die sich für
                verschiedene Situationen besonders gut eignen. Will ein Spieler nur seine eigenen Teams analysieren,
                ist die Darstellung auf <a href="https://swgoh.help">swgoh.help</a> zu empfehlen.</p>
            <p class="text-left">Der <strong>Mehrwehrt</strong> auf dieser Seite besteht in der Spalte "Link". Besteht eine Teamempfehlung aus 1-5 Charakteren, kann damit direkt zur Teamsuche mit dem <strong>Status der gesamten Gilde</strong> gesprungen werden.</p>
            <p class="text-left">Die Links öffenen standardmäßig im gleichen Fenster. Wer einen neuen Tab öffen möchte, kann die Standardfunktionen des Browsers nutzen.
                Z.B. Klick mit der mittleren Maustaste/Mausrad, Klick mit der linken Maustaste bei gedrückter STRG-Taste, Rechtsklick + in neuem Tab öffnen.</p>
            <p class="text-left">Beim Klick auf den Spaltenkopf einer Tabelle wird diese sortierbar und
                durchsuchbar.</p>
            <div class="tab-content" id="toonTabsContent">
                @forelse ($list ?? [] as $key => $section)
                    <div class="tab-pane fade{{ $loop->first ? ' active show' : ''}}" id="{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}-tab">
                    <h2>{{ ucwords(strtolower($section['name'] ?? '')) }} ({{ count($section['phase'] ?? []) }})</h2>
                    <span>{{ __('app.data_keys.rarity') }}: {{ $section['rarity'] ?? '' }}</span>
                    <span>{{ __('app.data_keys.gear') }}: {{ $section['gear'] ?? '' }}</span>
                    <span>{{ __('app.data_keys.level') }}: {{ $section['level'] ?? '' }}</span>
                    <span>Empfehlungen von Spielern für Spieler. Unverbindlich!</span>

                    @forelse ($section['phase'] ?? [] as $phase_key => $phase)
                    <hr />
                    <h3>{{ ucwords(strtolower($phase['name'] ?? 'unknown phase name')) }} ({{ count($phase['squads'] ?? []) }})</h3>
                    <table class="table table-hover toon-table">
                        <!-- table-striped table-dark  -->

                            @forelse ($phase['squads'] ?? [] as $squad_key => $squad)
                            @if ($loop->first)
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Link</th>
                                    @forelse ($squad as $info_key => $info)
                                    <!-- excluded from whitelist: main, url -->
                                    @if(in_array($info_key, ['name', 'note', 'team']))
                                        <th>{{ __('app.data_keys.' . $info_key) }}</th>
                                    @endif
                                    @empty
                    <!-- no entries -->
                                    @endforelse
                                </tr>
                            </thead>
                            <tbody>
                            @endif
                            <tr>
                                <td>{{ $squad_key }}</td>
                                <td>
                                @if(isset($squad['team']) && is_array($squad['team']) && in_array(count($squad['team']), [1,2,3,4,5]))
                                <a class="text-link" href="{{ route('guild.squads', $guild) }}?t1={{ explode(':', $squad['team'][0] ?? '')[0] }}&t2={{ explode(':', $squad['team'][1] ?? '')[0] }}&t3={{ explode(':', $squad['team'][2] ?? '')[0] }}&t4={{ explode(':', $squad['team'][3] ?? '')[0] }}&t5={{ explode(':', $squad['team'][4] ?? '')[0] }}">list</a>
                                @else
                                -
                                @endif
                                </td>
                                @forelse ($squad as $info_key => $info)
                                    <!-- excluded from whitelist: main, url -->
                                    @if(!in_array($info_key, ['name', 'note', 'team']))
                                        <!-- skip -->
                                    @elseif($info_key == 'name')
                                        <td>{{ ucwords(strtolower($info ?? '')) }}</td>
                                    @elseif($info_key == 'team' && is_array($info))
                                        <td>
                                        @forelse ($info as $toon_key => $toon)
                                            {{ strpos($toon, ':') === false ? $toon : substr($toon, 0, strpos($toon, ':')) }}
                                        @empty
                                            <!-- no entries -->
                                            no team members found!
                                        @endforelse
                                        </td>
                                    @elseif(is_array($info))
                                        <td>{{ implode(', ', $info) }}x </td>
                                    @else
                                        <td>{{ $info }}</td>
                                    @endif
                                    @empty
                    <!-- no entries -->
                                @endforelse
                            </tr>
                            @empty
                    <!-- no entries -->
                            @endforelse
                        </tbody>
                    </table>
                    @empty
                    <!-- no entries -->
                    @endforelse
                    </div>
                    @empty
                    <!-- no entries -->
                    @endforelse
            </div>
        </main>
    </div>
</div>

@endsection