@extends('layouts.app')

@include('layouts.cdn._datatables')
@push('scripts')
<script>
    $(document).ready(function () {
        var squadtable = $('table.squad-table');
        if (squadtable.length) {
            squadtable.DataTable({
            "paging": false,
            "ordering": true,
            "info": false,
            "order": [[2, "desc"]]
            });
        }
    });
</script>
@endpush

@section('content')

@php($bsize = '-sm'){{-- btn-sm, btn-md, btn-lg --}}

<div class="container-fluid">
    <main>
        <h1 class="h3">@if('ship' == $type){{ __('Ships') }}@else{{ __('Toons') }}@endif</h1>
        <form class="form-inline" action="{{ route($route, $page_guild) }}" method="post">
            @csrf
            @for ($id = 1; $id <= 5; $id++)
            <div class="form-group my-1">
            <label for="t{{ $id }}"># {{ $id }}</label>
            <select class="form-control mx-2" id="t{{ $id }}" name="t{{ $id }}">
                <option value="">@if('ship' == $type){{ __('Select Ship') }}@else{{ __('Select Character') }}@endif</option>
                @foreach ($units as $key => $value)
                @if ($key == ($char_list[$id-1] ?? 'NA') ){{-- Request::get($id) ?? old($id) does not work since there is no redirect with 'withInput()' --}}
                <option value="{{ $key }}" selected>{{ $unitKeys[$key]['name'] ?? $key }}</option>
                @else
                <option value="{{ $key }}">{{ $unitKeys[$key]['name'] ?? $key }}</option>
                @endif
                @endforeach
            </select>
            </div>
            @endfor
            <div class="form-group my-1">
            <button type="submit" class="btn btn-primary mx-2">{{ __('Submit') }}</button>
            </div>
        </form>

        <div class="form-group mt-1 mb-2">
            <!-- <label for="staticSquadLink">{{ __('Direct Link') }}</label> -->
            <input class="form-control" type="text" name="staticSquadLink" id="staticSquadLink" readonly="readonly"
            value="{{ route($route, $page_guild) }}?t={{ implode(',', $char_list) }}">
            <small id="staticSquadLinkHelp" class="form-text text-muted">{{ __('pages.squads.direct_link_info') }}</small>
        </div>

        <p class="text-left">{{ __('app.color_disclaimer') }} {{ __('pages.squads.used_for_calculation') }}</p>
        <p class="text-left">{{ __('pages.squads.field_order') }}: {{ __('Power') }}, {{ __('Gear Level') }}, {{ __('Level') }}, {{ __('Stars') }}, {{ __('Zetas') }}</p>
        <p class="text-left">{{ __('Last updated') }}: {{ date('D, d M Y', intval(substr($updated ?? '', 0, 10))) }}</p>
        <table class="table table-sm table-hover squad-table">
            <caption>
                @foreach ($char_list as $char)
                {{ $unitKeys[$char]['name'] ?? $char }}@if(!$loop->last),@endif
                @endforeach
            </caption>
            <thead>
                <tr>
                    <th>{{ __('Player') }}</th>
                    <th>{{ __('Units') }}</th>
                    <th>{{ __('Squad Power') }}</th>

                    @foreach ($char_list as $char)
                    <th>{{ $unitKeys[$char]['name'] ?? $char }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

                @foreach ($result as $player)
                <tr>
                    <td>{{ $roster[$player['id']] }}</td>

                    <td class="{{ getStatus('table-', count($char_list), $player['squad_count']) }}">{{
                        $player['squad_count'] }}</td>
                    <td>{{ $player['sort_sum'] }}</td>
                    @foreach ($player['units'] as $char => $unit)
                    @if (empty($unit))
                    <td>-</td>
                    @else
                    <td class="{{ getStatus('table-', [85, 7, 12], [$unit['level'], $unit['rarity'], $unit['gear']]) }}">
                        <button type="button" class="btn{{ $bsize }} btn-dark">{!! pad($unit['gp'], 5) !!}</button>
                        <button type="button" class="btn{{ $bsize }} {{ getStatus('btn-', 12, $unit['gear']) }}">{!!
                            pad($unit['gear'], 2) !!}</button>
                        <button type="button" class="btn{{ $bsize }} {{ getStatus('btn-', 85, $unit['level']) }}">{!!
                            pad($unit['level'], 2) !!}</button>
                        <button type="button" class="btn{{ $bsize }} {{ getStatus('btn-', 7, $unit['rarity']) }}">{!!
                            pad($unit['rarity'], 1) !!}</button>
                        @switch (count($unit['zetas'] ?? []))
                        @case(0)
                        @break
                        @case(1)
                        <button type="button" class="btn{{ $bsize }} btn-outline-dark">1 zeta</button>
                        @break
                        @default
                        <button type="button" class="btn{{ $bsize }} btn-outline-dark">{{ count($unit['zetas']) }}
                            zetas</button>
                        @break
                        @endswitch
                    </td>
                    @endif
                    @endforeach
                </tr>
                @endforeach

            </tbody>
        </table>
    </main>
</div>


<?php

function getStatus($prefix, $target, $current)
{
    $status = [];

    if (! is_array($target)) {
        $target = [$target];
    }
    if (! is_array($current)) {
        $current = [$current];
    }

    $target_max = count($target) - 1;
    $current_max = count($current) - 1;
    if ($target_max <= $current_max) {
        foreach ($current as $key => $value) {
            if (! is_numeric($target[min($key, $target_max)]) || ! is_numeric($value)) {
                continue;
            }
            $status[] = $target[min($key, $target_max)] - $value;
        }
    }

    if (empty($status)) {
        return '';
    }

    switch (max($status)) {
        case 0:
            return $prefix . 'success';
            break;
        case 1:
            return $prefix . 'warning';
            break;
        default:
            return $prefix . 'danger';
            break;
    }
}

function pad($input, $length)
{
    $pad_int = ' ';
    $pad_out = '&nbsp;';
    return str_replace($pad_int, $pad_out, str_pad($input, $length, $pad_int, STR_PAD_LEFT));
}


?>

@endsection
