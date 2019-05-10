@extends('layouts.app')

@include('layouts.cdn._datatables')
@push('scripts')
<script>
    $(function () {
      $('[data-toggle="popover"]').popover()
    });

    $('.popover-dismiss').popover({
      trigger: 'focus'
    });

    $('thead').on('click', function () {
        var table = $(this).parent('table');
        if (table.hasClass('toon-table') && !table.hasClass('datatable')) {
            table.DataTable();
        }
    });
</script>
@endpush

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
                    @foreach ($units as $unit_key => $unit)
                    @if ($loop->first)
                    <a class="nav-link active" id="{{ $unit_key }}-tab" data-toggle="pill" href="#{{ $unit_key }}" role="tab"
                        aria-controls="{{ $unit_key }}" aria-selected="true">{{ $unit['name'] ?? $unit_key }} ({{ count($unit['players']) }})</a>
                    @else
                    <a class="nav-link" id="{{ $unit_key }}-tab" data-toggle="pill" href="#{{ $unit_key }}" role="tab"
                        aria-controls="{{ $unit_key }}" aria-selected="false">{{ $unit['name'] ?? $unit_key }} ({{ count($unit['players']) }})</a>
                    @endif
                    @endforeach
                </div>
            </nav>
        </div>

        <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">

        @if($pagination ?? null)
        <div class="alert alert-info" role="alert">
        @foreach ($pagination as $key => $value)
        @if ($loop->first)Nav: @endif
        @if (!$loop->first) <i class="fa fa-empire"></i><i class="fa fa-resistance"></i> @endif
        <a href="{{ route($route_name, $guild) }}/{{ $key }}">{{ $value['first'] ?? '' }} - {{ $value['last'] ?? '' }}</a>
        @endforeach
        </div>
        @endif


            <h1 class="mr-auto">{{ __('Full Roster') }} - {{ __($title) }}</h1>
            <p class="lead text-left">{!! __('app.roster.intro', ['guild' => '<strong>' . $guild->name . '</strong>']) !!}</p>
            <p class="text-left">{{ __('app.roster.description') }}</p>
            <p class="text-left">{{ __('app.howto.click_head') }}</p>
            <p class="text-left">{{ __('Last updated') }}: {{ date('D, d M Y', intval(substr($updated ?? '', 0, 10))) }}</p>
            <div class="tab-content" id="toonTabsContent">
                @foreach ($units as $unit_key => $unit)
                    <div class="tab-pane fade{{ $loop->first ? ' active show' : ''}}" id="{{ $unit_key }}" role="tabpanel" aria-labelledby="{{ $unit_key }}-tab">
                    <h2>{{ $unit['name'] ?? $unit_key }} ({{ count($unit['players']) }})</h2>
                    <p class="text-muted">[{{ $unit['side'] ?? '' }}] {{ $unit['desc'] ?? '' }}</p>
                    <table class="table table-hover toon-table">
                        <!-- table-striped table-dark  -->

                            @foreach ($unit['players'] as $player_key => $player)
                            @if ($loop->first)
                            <thead>
                                <tr>
                                    <th>#</th>
                                    @foreach ($player as $key => $value)
                                    @if(!isset($filter) || in_array($key, $filter))
                                    <th>{{ __('fields.' . $key) }}</th>
                                    @if($key == 'skills')
                                    <th>{{ __('fields.zetas') }}</th>
                                    @endif
                                    @endif
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                            @endif
                            <tr>
                                <td>{{ $player_key }}</td>
                                @foreach ($player as $key => $value)
                                @if(!isset($filter) || in_array($key, $filter))
                                    @if ($key == 'updated')
                                        <td>{{ date('D, d M Y', substr($value, 0, 10)) }}</td>
                                    @elseif($key == 'skills')
                                    <?php asort($value); ?>
                                    <?php $zetacount = 0; ?>
                                        <td><a tabindex="0" role="button" class="btn btn-sm btn-secondary"
                                            data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-html="true"
                                            data-content="
@forelse($value as $skill_key => $skill)
@if(!$loop->first) <br /> @endif
- {{ $skillKeys[$skill['id']] ?? $skill['id'] }} ({{ $skill['tier'] }})
@if($skill['isZeta']) ZETA! @endif
@empty
@endforelse
">{{ count($value) }}x</a>
@forelse($value as $skill_key => $skill)
@if(!$loop->first)-@endif{{ $skill['tier'] }}@if($skill['tier'] == 8 && $skill['isZeta']){{ 'z' }}<?php ++$zetacount; ?>@endif
@empty
@endforelse
</td><td>{{ $zetacount ?? '-' }}</td>
                                    @elseif(is_array($value))
                                    <td><a tabindex="0" role="button" class="btn btn-sm btn-secondary"
                                            data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-html="true"
                                            data-content="{!! recImplode('<br />', $value) !!}">{{ count($value) }}x</a></td>
                                    @else
                                    <td>{{ $value }}</td>
                                    @endif
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

<?php
function recImplode($del, $arr, $result = '', &$level = 0) {
    ++$level;
    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            $result = recImplode($level > 2 ? ', ' : $del, $value, $result, $level);
        } elseif(in_array($key, ['nameKey'])) {
            //skip
            continue;
        } else {
            if ($level > 2) {
                $result .= "$del $value ($key)";
            } else {
            $result .= $del.str_repeat(' - ', $level-1).$key.': '.$value;
        }
        }
    }
    --$level;
    return $result;
}
?>
