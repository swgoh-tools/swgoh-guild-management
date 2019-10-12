@extends('layouts.2col')

@include('layouts.cdn._datatables')
@include('layouts.cdn._highcharts')

@push('scripts')
<script>
    $('thead').on('click', function () {
        var table = $(this).parent('table');
        if (table.hasClass('my-data-table') && !table.hasClass('datatable')) {
            table.DataTable();
        }
    });
</script>
@foreach ($charts as $chart)
{!! $chart->script() !!}
@endforeach
@endpush

@php
    $top_limit = $top_limit ?? 10;
    // $player_limit = $player_limit ?? 50;
@endphp

@section('sidebar')
<div class="d-flex">
    <button class="btn btn-link bd-search-docs-toggle d-md-none p-0 ml-3" type="button" data-toggle="collapse"
        data-target="#bd-docs-nav" aria-controls="bd-docs-nav" aria-expanded="false"
        aria-label="Toggle docs navigation">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false">
            <title>{{ __('Menu') }}</title>
            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10"
                d="M4 7h22M4 15h22M4 23h22"></path>
        </svg>
    </button>
</div>

<nav class="collapse bd-links" id="bd-docs-nav">
    <div class="nav flex-column nav-pills" id="sw-tab" role="tablist" aria-orientation="vertical">
        @foreach ($stats_total as $item_key => $item)
        <li class="nav-item">
            <a class="nav-link" href="#{{$item_key}}">{{ __($lang_prefix.$item_key) }}</a>
        </li>
        @endforeach
    </div>
</nav>
@endsection

@section('content')
<div class="container-fluid" role="main">

    <div class="row justify-content-center">
        <div class="col">
            @include('layouts.comp._nav', ['comp_nav' => [
            [route('guild.stats.players', [$page_guild]), __('Player Stats')],
            [route('guild.stats.players.percent', [$page_guild]), __('Player Stats') . ' ('.__('Percent').')'],
            [route('guild.stats.players.secondary', [$page_guild]), __('fields.mods_secondaryStat') . '
            ('.__('Details').')'],
            ]])
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col">
            <h1 class="mr-auto">{{ __('pages.'.$data_key.'.title') }}</h1>
            <p class="text-left">{!! __('pages.'.$data_key.'.intro') !!}</p>
            <p class="text-left">{!! __('pages.'.$data_key.'.description') !!}</p>
            <p class="text-left">{!! __('pages.'.$data_key.'.legend') !!}</p>
            <p class="text-left text-muted">{{ __('app.howto.click_head') }}</p>
        </div>
    </div>

    @foreach ($stats_total as $item_key => $item)
    @php
    krsort($item);
    @endphp

    <div class="row justify-content-center">
        <div class="col mt-4">
            <span class="anchor" id="{{$item_key}}"></span>
            <h2 class="alert alert-dark">{{ __($lang_prefix.$item_key) }}</h2>

            @isset($charts[$item_key])
            {!! $charts[$item_key]->container() !!}
            @endisset

            <div class="tab-content" id="{{$item_key}}TabContent">

                <table class="table table-hover my-data-table @if($percent) table-sm @endif">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>{{__('Count')}}</th>
                            @foreach ($item as $info_key => $info)
                            @if (in_array($item_key, ['mods_primaryStat', 'mods_secondaryStat']))
                            <th>{{ __('enums.'.$info_key) }}</th>
                            @else
                            <th>{{ __($info_key) }}</th>
                            @endif
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stats as $player_code => $player_stats)
                        <tr>
                            <td>{{$players[$player_code] ?? $player_code}}</td>
                            @php
                            if (in_array($item_key, ['mods_primaryStat', 'mods_secondaryStat'])) {
                            $item_count = array_sum($player_stats['mods_primaryStat'] ?? []);
                            }
                            else {
                            $item_count = array_sum($player_stats[$item_key] ?? []);
                            }
                            @endphp
                            <td>{{ $item_count }}</td>
                            @foreach ($item as $info_key => $info_total)
                            @php
                            $field_value = $player_stats[$item_key][$info_key] ?? null;
                            @endphp
                            @if ($field_value)
                            <td class="text-right">@if(is_numeric($field_value))
                                {{ number_format($field_value) }} @else {{ $field_value }}
                                @endif @if(is_numeric($field_value) && $percent)
                                ({{ number_format($field_value / $item_count * 100) }}%) @endif</td>
                            @else
                            <td></td>
                            @endif
                            @endforeach

                        </tr>
                        @endforeach
                        @if ($stats_mods_ranking[$item_key] ?? null)
                        @foreach ($stats_mods_ranking[$item_key] as $ranking_value => $ranking_players)
                        @if ($loop->iteration > $top_limit)
                        <tr>
                            <td>...</td>
                            <td>...</td>
                        </tr>
                        @break
                        @endif
                        <tr>
                            <td>{{$ranking_value}}</td>
                        <td>
                            @php
                                $cnt_players = count($ranking_players);
                                $sum_players = array_count_values($ranking_players);
                                arsort($sum_players);
                            @endphp
                            @foreach ($sum_players as $ranking_player => $ranking_amount)
                                @if(!$loop->first), @endif
                                {{$players[$ranking_player] ?? $ranking_player}}@if($ranking_amount > 1) ({{$ranking_amount}})@endif
                                @endforeach</td>
                        </tr>

                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endforeach

    @foreach($charts as $chart_key => $chart)
    @if(isset($stats_total[$chart_key]))
    {{-- chart already processed --}}
    @else
    {{-- print all remaining charts --}}
    <div class="row justify-content-center">
        <div class="col">
            <span class="anchor" id="{{$chart_key}}"></span>
            <h2 class="alert alert-dark">{{ __('enums.'.$chart_key) }}</h2>
            {!! $chart->container() !!}
        </div>
    </div>
    @endif
    @endforeach

</div>

@endsection
