@extends('layouts.app')

@include('layouts.css._gear')
@include('layouts.css._comp')

@section('content')
@include('player.home._nav')
<!-- <p class="text-left">{{ __('app.howto.click_head') }}</p> -->

<form class="form-inline" action="{{ route('player.gear', $player) }}" method="post">
    @csrf
    @for ($id = 0; $id <= 4; $id++) <div class="form-group my-1">
        <label for="t{{ $id }}"># {{ $id + 1 }}</label>
        <select class="form-control mx-2" id="t{{ $id }}" name="t{{ $id }}">
            <option value="">{{ __('Select Character') }}</option>
            @foreach ($chars as $value)
            @php
            $key = $value['base_id'];
            $char_position = $char_list_nested[$key]['key'] ?? null;
            @endphp
            @if ($id === $char_position )
            ){{-- Request::get($id) ?? old($id) does not work since there is no redirect with 'withInput()' --}}
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
        value="{{ route('player.gear', $player) }}?t={{ implode(',', array_keys($char_list_nested ?? [])) }}">
        <input class="form-control" type="text" name="staticSquadLinkDetail" id="staticSquadLinkDetail" readonly="readonly"
        value="{{ route('player.gear', $player) }}?t={{ implode(',', $char_list_flat) }}">
        <small id="staticSquadLinkHelp" class="form-text text-muted">{{ __('app.howto.direct_link') }} <a
            href="{{ route('player.gear', $player) }}?t={{ implode(',', $char_list_sample) }}">{{ __('Example') }}</a></small>
            <small id="staticSquadLinkDetailHelp" class="form-text text-muted">{{ __('app.howto.direct_link++gear') }} </small>
    </div>

<ul class="nav nav-tabs justify-content-center" id="gearTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home">{{ __('Toons') }} - {{ __('Gear Check') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="mat-tab" data-toggle="tab" href="#mat" role="tab" aria-controls="mat">{{ __('Total') }} - {{ __('Material') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="crafted-tab" data-toggle="tab" href="#crafted" role="tab" aria-controls="crafted">{{ __('Total') }} - {{ __('Fully Crafted Gear') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>

      <div class="tab-content" id="gearTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<div class="card mb-2">
    <h5 class="card-header">{{ __('Toons') }} - {{ __('Gear Check') }}</h5>
    <div class="card-body">
        <table class="table table-sm table-hover">
            @php($stats = [])
            @foreach($chars ?? [] as $char)
            {{-- TEMPORARY remove G13 as long as its all 9999 --}}
            @if(array_key_last($char['gear_levels']) == 12) @php(array_pop($char['gear_levels'])) @endif
            {{-- end remove --}}
            @if($loop->first)
            <thead>
                <tr>
                    <th>{{ __('Character') }}</th>
                    @foreach($char['gear_levels'] as $gear_level)
                    <th>{{ $gear_level['tier'] ?? '-' }}</th>
                    @php($stats['tiers'][$gear_level['tier']] = [])
                    @endforeach
                </tr>
            </thead>
            <tbody>

                @endif

                @if (! ($char_list_nested[$char['base_id']] ?? false))
                {{-- skip if not in selection --}}
                @continue

                @endif
                <tr>
                    <td>{{ $char['name'] ?? '-' }}</td>
                    @foreach($char['gear_levels'] as $gear_level)
                    <td>
                        @if($gear_level['tier'] > $char_list_nested[$char['base_id']]['tier'])
                        {{-- implode(', ', $gear_level['gear'] ?? []) --}}
                        @foreach($gear_level['gear'] as $key => $item)
                        @include('layouts.img._gear-icon-small', ['gi_gear' => $gear[$item]])
                        @php($stats['tiers'][$gear_level['tier']][$item] = 1 +
                        ($stats['tiers'][$gear_level['tier']][$item] ?? 0))
                        @php($stats['chars'][$char['base_id']][$item] = 1 + ($stats['chars'][$char['base_id']][$item] ??
                        0))
                        @php($stats['sum'][$item] = 1 + ($stats['sum'][$item] ?? 0))
                        @endforeach
                        @elseif($gear_level['tier'] == $char_list_nested[$char['base_id']]['tier'])
                        @foreach($gear_level['gear'] as $key => $item)
                        @if(!in_array($key + 1, $char_list_nested[$char['base_id']]['gear']))
                        @include('layouts.img._gear-icon-small', ['gi_gear' => $gear[$item]])
                        {{-- $item --}}
                        @php($stats['tiers'][$gear_level['tier']][$item] = 1 +
                        ($stats['tiers'][$gear_level['tier']][$item] ?? 0))
                        @php($stats['chars'][$char['base_id']][$item] = 1 + ($stats['chars'][$char['base_id']][$item] ??
                        0))
                        @php($stats['sum'][$item] = 1 + ($stats['sum'][$item] ?? 0))
                        @else
                        <div style="position:relative;display:inline-block;">
                            <i class="fa fa-check fg-success"
                                style="opacity:0.6;position:absolute;bottom:-12px;right:-6px;font-size: xx-large;"></i>
                            <span style="opacity:0.3;">
                                @include('layouts.img._gear-icon-small', ['gi_gear' => $gear[$item]])
                            </span></div>
                        @endif
                        @endforeach
                        @else
                        OK
                        @endif
                    </td>
                    @endforeach
                </tr>
                @endforeach
                @isset($stats['tiers'])
                <tr class="table-primary">
                    <td>{{ __('labels.gear.full_with_indredients') }}@include('layouts.comp._help', ['help_text' =>
                        __('labels.gear.full_with_indredients--help')])</td>
                    @foreach($stats['tiers'] as $key => $tier)
                    <td>
                        @php(arsort($tier))
                        @php($stats['materials'][$key] = [])
                        @foreach($tier as $id => $amount)
                        <div style="clear:both;">
                            @include('layouts.img._gear-icon-small', ['gi_gear' => $gear[$id], 'gi_amount' => $amount .
                            'x'])
                            @foreach($gear[$id]['mat_list'] ?? [] as $mat_id => $mat_amount)
                            @include('layouts.img._gear-icon-micro', ['gi_gear' => $gear[$mat_id], 'gi_amount' =>
                            $mat_amount . 'x'])
                            @php($stats['materials'][$key][$mat_id] = ($amount * $mat_amount) +
                            ($stats['materials'][$key][$mat_id] ?? 0))
                            @php($stats['materials_sum'][$mat_id] = ($amount * $mat_amount) +
                            ($stats['materials_sum'][$mat_id] ?? 0))
                            @endforeach
                        </div>
                        @endforeach
                    </td>
                    @endforeach
                </tr>
                <tr class="table-secondary">
                    <td>{{ __('labels.gear.indredients') }}@include('layouts.comp._help', ['help_text' =>
                        __('labels.gear.indredients--help')])</td>
                    @foreach($stats['materials'] as $key => $tier)
                    <td>
                        @php(arsort($tier))
                        @foreach($tier as $id => $amount)
                        @include('layouts.img._gear-icon-small', ['gi_gear' => $gear[$id], 'gi_amount' => $amount .
                        'x'])
                        @endforeach
                    </td>
                    @endforeach
                </tr>
            </tbody>
            @endisset
        </table>
    </div>
</div>

</div>
<div class="tab-pane fade" id="mat" role="tabpanel" aria-labelledby="mat-tab">

@php($sum = $stats['materials_sum'] ?? [])
@php(arsort($sum))
<div class="card mb-2">
    <h5 class="card-header">{{ __('Total') }} - {{ __('Material') }}</h5>
    <div class="card-body">
        @foreach($sum as $id => $amount)
        @include('layouts.img._gear-icon-small', ['gi_gear' => $gear[$id], 'gi_amount' => $amount . 'x'])
        @endforeach
    </div>
</div>

</div>
<div class="tab-pane fade" id="crafted" role="tabpanel" aria-labelledby="crafted-tab">

@php($sum = $stats['sum'] ?? [])
@php(arsort($sum))
<div class="card mb-2">
    <h5 class="card-header">{{ __('Total') }} - {{ __('Fully Crafted Gear') }}</h5>
    <div class="card-body">
        @foreach($sum as $id => $amount)
        <div style="clear:both;">
            @include('layouts.img._gear-icon-small', ['gi_gear' => $gear[$id], 'gi_amount' => $amount . 'x'])
            @foreach($gear[$id]['mat_list'] ?? [] as $mat_id => $mat_amount)
            @include('layouts.img._gear-icon-micro', ['gi_gear' => $gear[$mat_id], 'gi_amount' => $mat_amount . 'x'])
            @endforeach
        </div>
        @endforeach
    </div>
</div>

</div>
</div>

@endsection
