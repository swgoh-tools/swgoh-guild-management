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
                    @switch($key)
                        @case('updated')
                            <h2>{{ ucwords(strtolower($key)) }}</h2>
                            <p>{{ __('Currentness') }}: {{ timezone()->formatDateLong($section) }}</p>
                            @break

                        @case('twcounters')
                            <h2>{{ ucwords(strtolower($section['name'] ?? '')) }} ({{ count($section['phase'] ?? []) }})</h2>
                            <span>{{ __('app.disclaimer_community') }}</span>


                            @forelse ($section['phase'] ?? [] as $opponent)
                                <hr />
                                <h3>{{ $unitKeys[$opponent['team']]['name'] ?? $opponent['team'] ?? 'unknown opponent' }}</h3>

                                @php($squads = [])
                                @forelse ($opponent['hardcounters'] ?? [] as $squad)
                                    @php($squad['note'] = 'hard counter')
                                    @php($squads[] = $squad)
                                @empty
                                <!-- no hardcounters -->
                                @endforelse
                                @forelse ($opponent['softcounters'] ?? [] as $squad)
                                    @php($squad['note'] = 'soft counter')
                                    @php($squads[] = $squad)
                                @empty
                                <!-- no softcounters -->
                                @endforelse
                                @forelse ($squads as $squad_key => $squad)
                                    @include('guild.list.squads._table')
                                @empty
                                <!-- no entries -->
                                <span>{{ __('No counter teams defined') }}</span>
                                @endforelse
                            @empty
                            <!-- no entries -->
                            @endforelse

                            @break

                        @default
                            <h2>{{ ucwords(strtolower($section['name'] ?? '')) }} ({{ count($section['phase'] ?? []) }})</h2>
                            <span>{{ __('fields.rarity') }}: {{ $section['rarity'] ?? '' }}</span>
                            <span>{{ __('fields.gear') }}: {{ $section['gear'] ?? '' }}</span>
                            <span>{{ __('fields.level') }}: {{ $section['level'] ?? '' }}</span>
                            <span>{{ __('app.disclaimer_community') }}</span>

                            @forelse ($section['phase'] ?? [] as $phase_key => $phase)
                                <hr />
                                <h3>{{ ucwords(strtolower($phase['name'] ?? 'unknown phase name')) }} ({{ count($phase['squads'] ?? []) }})</h3>

                                @forelse ($phase['squads'] ?? [] as $squad_key => $squad)
                                    @include('guild.list.squads._table')
                                @empty
                                <!-- no entries -->
                                @endforelse
                            @empty
                            <!-- no entries -->
                            @endforelse
                    @endswitch
                    </div>
                @empty
                <!-- no entries -->
                @endforelse
            </div>

@endsection
