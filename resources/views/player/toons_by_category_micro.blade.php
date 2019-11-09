@extends('layouts.app')

@include('layouts.css._gear')
@include('layouts.cdn._datatables')

@push('scripts')
<script>
    $(document).ready(function () {
        var table = $('table.player-toons-table');
        if (table.length) {
            table.DataTable({
            "paging": false,
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
    @foreach($roster ?? [] as $categoryKey => $category)
    <tr>
        <td>
            {{ $categoryKey }}
        </td>

    {{-- Manually add gp column as second to make sure it is available for sorting with datatables --}}
        <td>
            @foreach($category as $key => $unit)
            @if ('CHARACTER' != ($unit['combatType'] ?? null))
            @php
            continue;
            @endphp
            @endif

            @php
            $char_count++;
            @endphp
    @include('player.toons._add-th', ['th_key' => 'category'])
    @include('player.toons._add-th', ['th_key' => 'toons'])

            @foreach($unit as $stat_key => $stat)
                @switch($stat_key)
                @case('defId')

                @include('layouts.img._unit-icon-micro', ['ui_unit' => $chars[$stat] ?? '', 'ui_stats' => $unit ?? ''])

                {{-- <td class="text-right">{{ $unit['gp'] ?? '' }}</td> --}}
                @break

                @case('nameKey')
                {{-- @case('combatType') --}}
                {{-- @case('gp') --}}
                @case('rarity')
                @case('level')
                @case('gear')

                {{-- <td class="text-right">{{ $stat }}</td> --}}
                @break
                @case('equipped')

    {{-- <td> --}}
        {{-- @for ($i = 0; $i < 6; $i++) @php $slotIsFilled=false; @endphp @foreach ($stat as $slot) @if ($i==($slot['slot']
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
            @endfor --}}
    {{-- </td> --}}
    @break


    @case('skills')

    {{-- <td> --}}
        {{-- <div style="display:none;">
        @foreach($stat as $skills)
        @include('layouts.img._skill-icon', ['si_skill' => $skills, 'si_skillKeys' => $skillKeys])
        @endforeach
    </div> --}}
    {{-- </td> --}}
    @break

    @case('mods')

    {{-- <td> --}}
        {{-- @for ($i = 0; $i < 6; $i++) @if ($stat[$i] ?? null) @include('layouts.img._mod-icon-small', ['mi_mod'=>
            $stat[$i]])
            @else
            @include('layouts.img._mod-icon-small', ['mi_mod' => ['slot' => $i]])
            @endif
            @endfor --}}
    {{-- </td> --}}
    @break



    @default
    <!-- {{ $stat_key }} skipped -->
    @endswitch

    @endforeach
@endforeach
    </td>
</tr>
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
