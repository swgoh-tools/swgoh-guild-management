@extends('layouts.app')

@include('layouts.css._gear')
@include('layouts.cdn._datatables')

@push('scripts')
<script>
    $(document).ready(function () {
        var table = $('table.player-toons-table');
        if (table.length) {
            table.DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "order": [[1, "desc"]]
            });
        }
    });
</script>
@endpush

@section('content')
@include('player.home._nav')
<!-- <p class="text-left">{{ __('app.howto.click_head') }}</p> -->
@php
$char_count = 0;
@endphp
@push('table-body')
@foreach($info['roster'] ?? [] as $key => $unit)
@if ('CHARACTER' != ($unit['combatType'] ?? null))
@php
continue;
@endphp
@endif
@php
$char_count++;
@endphp

<tr>
    @foreach($unit as $stat_key => $stat)
    @switch($stat_key)
    @case('defId')
    @include('player.toons._add-th')

    <td>
        @include('layouts.img._unit-icon-micro', ['ui_unit' => $chars[$stat] ?? '', 'ui_stats' => $unit ?? ''])
    </td>

    {{-- Manually add gp column as second to make sure it is available for sorting with datatables --}}
    @include('player.toons._add-th', ['th_key' => 'gp'])
    <td class="text-right">{{ $unit['gp'] ?? '' }}</td>
    @break

    @case('nameKey')
    {{-- @case('combatType') --}}
    {{-- @case('gp') --}}
    @case('rarity')
    @case('level')
    @case('gear')
    @include('player.toons._add-th')

    <td class="text-right">{{ $stat }}</td>
    @break
    @case('equipped')
    @include('player.toons._add-th')

    <td>
        @for ($i = 0; $i < 6; $i++) @php $slotIsFilled=false; @endphp @foreach ($stat as $slot) @if ($i==($slot['slot']
            ?? 99)) @include('layouts.img._gear-icon-micro', ['gi_gear'=> $gear[$slot['equipmentId']] ?? '', 'gi_name'
            => $slot['nameKey'] ?? ''])
            <!-- {{ __('fields.slot') }} {{ $slot['slot'] ?? '' }} {{ $slot['nameKey'] ?? '' }} -->
            @php
            $slotIsFilled = true;
            break;
            @endphp
            @endif
            @endforeach
            @if (!$slotIsFilled)
            <div style="opacity:0.4;">
                @include('layouts.img._gear-icon-micro', ['gi_gear' =>
                $gear[$chars[$unit['defId']]['gear_levels'][$unit['gear']-1]['gear'][$i] ?? 0] ?? '', 'gi_name' => ''])
            </div>
            @endif
            @endfor
    </td>
    @break


    @case('skills')
    @include('player.toons._add-th')

    <td>
        @foreach($stat as $skills)
        @include('layouts.img._skill-icon', ['si_skill' => $skills])
        @endforeach
    </td>
    @break

    @case('mods')
    @include('player.toons._add-th')

    <td>
        @for ($i = 0; $i < 6; $i++) @if ($stat[$i] ?? null) @include('layouts.img._mod-icon-small', ['mi_mod'=>
            $stat[$i]])
            @else
            @include('layouts.img._mod-icon-small', ['mi_mod' => ['slot' => $i]])
            @endif
            @endfor
    </td>
    @break



    @default
    <!-- {{ $stat_key }} skipped -->
    @endswitch
    @endforeach
</tr>
{{-- @foreach($unit['crew'] ?? [] as $crew)
                <tr>
                    <th>{{ __('fields.slot') }} {{ $crew['slot'] ?? '' }}</th>
<td>{{ $crew['unitId'] ?? '' }}</td>
<td>{{ $crew['gp'] ?? '' }}</td>
<td>{{ $crew['cp'] ?? '' }}</td>
<td>@foreach($crew['skillReferenceList'] ?? [] as $skillref)
    {{ $skillref['skillId'] ?? '' }}: {{ $skillref['requiredTier'] ?? '' }} ({{ $skillref['requiredRarity'] ?? '' }})
    @endforeach</td>
</tr>
@endforeach --}}
@endforeach
@endpush

<table class="player-toons-table table-sm table-striped table-hover">
    <thead>
        <tr>
            @stack('table-headers')
        </tr>
    </thead>
    <tbody>
        @stack('table-body')
    </tbody>
</table>
@endsection
