@extends('layouts.app')

@include('layouts.cdn._datatables')

@section('content')
<?php
    $bsize = '-sm'; // btn-sm, btn-md, btn-lg
?>
<div class="container-fluid">
    <main>
        <h1 class="h3">{{ $caption }}</h1>
        <form class="form-inline" action="" method="post">
            @csrf
            @foreach ($select_list as $id => $name)
            <label for="{{ $id }}">{{ $name }}</label>
            <select class="form-control mb-2" id="{{ $id }}" name="{{ $id }}">
                <option value="">Charakter auswählen</option>
                @foreach ($units as $key => $value)
                @if ($key == Request::get($id) ){{-- old($id) does not work since there is no redirect with 'withInput()' --}}
                <option value="{{ $key }}" selected>{{ $key }}</option>
                @else
                <option value="{{ $key }}">{{ $key }}</option>
                @endif
                @endforeach
            </select>
            @endforeach
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>

        <p class="text-center">Farbliche Markierungen nur zur groben Einordnung.
            Anzahl der vorhandenen Toons, Ausrüstungsstufe, Level und Sterne werden berücksichtigt.</p>
        <p class="text-center">Reihenfolge der Angabe bei den Toons: Macht, Ausrüstungsstufe, Level, Sterne, Zetas</p>
        <table class="table table-sm table-hover squad-table">
            <caption>{{ $caption }}</caption>
            <thead>
                <tr>
                    <th>Player</th>
                    <th>Units</th>
                    <th>Squad Power</th>

                    @foreach ($char_list as $char)
                    <th>{{ $char }}</th>
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
                    {{-- <button type="button" class="btn btn-outline-primary">Primary</button> --}}
                    {{-- <button type="button" class="btn btn-lg btn-primary" disabled>Primary button</button> --}}
                    {{-- <button type="button" class="btn btn-primary">Primary</button> --}}
                    {{-- <button type="button" class="btn btn-secondary">Secondary</button> --}}
                    {{-- <button type="button" class="btn btn-success">Success</button> --}}
                    {{-- <button type="button" class="btn btn-danger">Danger</button> --}}
                    {{-- <button type="button" class="btn btn-warning">Warning</button> --}}
                    {{-- <button type="button" class="btn btn-info">Info</button> --}}
                    {{-- <button type="button" class="btn btn-light">Light</button> --}}
                    {{-- <button type="button" class="btn btn-dark">Dark</button> --}}
                    {{-- <button type="button" class="btn btn-link">Link</button> --}}
                    <td class="{{ getStatus('table-', [85, 7, 12], [$unit['level'], $unit['starLevel'], $unit['gearLevel']]) }}">
                        <button type="button" class="btn{{ $bsize }} btn-dark">{!! pad($unit['gp'], 5) !!}</button>
                        <button type="button" class="btn{{ $bsize }} {{ getStatus('btn-', 12, $unit['gearLevel']) }}">{!!
                            pad($unit['gearLevel'], 2) !!}</button>
                        <button type="button" class="btn{{ $bsize }} {{ getStatus('btn-', 85, $unit['level']) }}">{!!
                            pad($unit['level'], 2) !!}</button>
                        <button type="button" class="btn{{ $bsize }} {{ getStatus('btn-', 7, $unit['starLevel']) }}">{!!
                            pad($unit['starLevel'], 1) !!}</button>
                        @switch (count($unit['zetas']))
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