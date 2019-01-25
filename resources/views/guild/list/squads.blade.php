@extends('layouts.2col')

@section('sidebar')
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
@endsection

@section('content')
            <h1 class="mr-auto">{{ __('app.squads.title') }}</h1>
            <p class="text-left">{!! __('app.squads.intro') !!}</p>
            <p class="text-left">{!! __('app.squads.description') !!}</p>
            <p class="text-left">{!! __('app.squads.legend') !!}</p>
            <p class="text-left">{{ __('app.howto.new_tab') }}</p>
            <!-- <p class="text-left">{{ __('app.howto.click_head') }}</p> -->
            <div class="tab-content" id="toonTabsContent">
                @forelse ($list ?? [] as $key => $section)
                    <div class="tab-pane fade{{ $loop->first ? ' active show' : ''}}" id="{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}-tab">
                    <h2>{{ ucwords(strtolower($section['name'] ?? '')) }} ({{ count($section['phase'] ?? []) }})</h2>
                    <span>{{ __('fields.rarity') }}: {{ $section['rarity'] ?? '' }}</span>
                    <span>{{ __('fields.gear') }}: {{ $section['gear'] ?? '' }}</span>
                    <span>{{ __('fields.level') }}: {{ $section['level'] ?? '' }}</span>
                    <span>{{ __('app.disclaimer_community') }}</span>

                    @forelse ($section['phase'] ?? [] as $phase_key => $phase)
                    <hr />
                    <h3>{{ ucwords(strtolower($phase['name'] ?? 'unknown phase name')) }} ({{ count($phase['squads'] ?? []) }})</h3>
                    <table class="table table-hover toon-table">
                        <!-- table-striped table-dark table-sm  -->

                            @forelse ($phase['squads'] ?? [] as $squad_key => $squad)
                            @if ($loop->first)
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Link</th>
                                    @forelse ($squad as $info_key => $info)
                                    <!-- excluded from whitelist: main, url -->
                                    @if(in_array($info_key, ['name', 'note', 'team']))
                                        <th>{{ __('fields.' . $info_key) }}</th>
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
                                @if(is_array($squad['team'] ?? 'NOARRAY'))
                                @php($team_plain = [])
                                @php($chunk_size = 10)
                                    @foreach($squad['team'] as $toon)
                                        @php($team_plain[] = explode(':', $toon)[0])
                                    @endforeach
                                    @foreach(array_chunk($team_plain, $chunk_size) as $team_part)
                                    @if(count($squad['team']) <= 5)
                                    <a class="text-link" href="{{ route('guild.team.toons', $guild) }}?t={{ implode(',', $team_part) }}">list</a>
                                    @else
                                    <a class="text-link" href="{{ route('guild.team.toons', $guild) }}?t={{ implode(',', $team_part) }}">list/{{ count($team_part) }}</a>
                                    @endif
                                    @endforeach
                                    {{-- @if(count($squad['team']) > $chunk_size)({{ count($squad['team']) }})@endif --}}
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
@foreach (preg_split('/:/', $toon) as $toonValue)
@if($loop->first){{ $unitKeys[$toonValue]['name'] ?? $toonValue }}@else <div class="mytooltip mytooltip-top mytooltip-no-wrap icon-zeta"><span class="mytooltiptext">{{ $skillKeys[$toonValue] ?? $toonValue }}</span></div>@endif
@endforeach
@if(!$loop->last),@endif
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

@endsection
