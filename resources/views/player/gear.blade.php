@extends('layouts.app')

@push('styles')
<style>
/* .pull-left {
	float: left !important;
} */

.gear-icon {
 width:50px;
 height:50px;
 display:inline-block;
 vertical-align:middle;
 position:relative;
 width:50px;
 height:50px
}
.gear-icon:before {
 content:"";
 display:block;
 background:url(//swgoh.gg/static/img/ui/gear-atlas.png) no-repeat;
 position:absolute;
 top:0;
 left:0;
 right:0;
 bottom:0;
 z-index:2
}
.pull-left .gear-icon {
 /* margin-right:10px */
}
.gear-icon.gear-icon-micro {
 width:32px;
 height:32px
}
.gear-icon.gear-icon-micro .gear-icon-img {
 width:32px;
 height:32px
}
.gear-icon.gear-icon-micro.gear-icon-tier1:before {
 background-position:-32px -234px
}
.gear-icon.gear-icon-micro.gear-icon-tier2:before {
 background-position:-64px -234px
}
.gear-icon.gear-icon-micro.gear-icon-tier4:before {
 background-position:-96px -234px
}
.gear-icon.gear-icon-micro.gear-icon-tier7:before {
 background-position:-128px -234px
}
.gear-icon.gear-icon-micro.gear-icon-tier11:before {
 background-position:-160px -234px
}
.gear-icon.gear-icon-micro.gear-icon-tier12:before {
 background-position:-192px -234px
}
.gear-icon.gear-icon-small {
 width:40px;
 height:40px
}
.gear-icon.gear-icon-small .gear-icon-img {
 width:40px;
 height:40px
}
.gear-icon.gear-icon-small.gear-icon-tier1:before {
 background-position:-40px -194px
}
.gear-icon.gear-icon-small.gear-icon-tier2:before {
 background-position:-80px -194px
}
.gear-icon.gear-icon-small.gear-icon-tier4:before {
 background-position:-120px -194px
}
.gear-icon.gear-icon-small.gear-icon-tier7:before {
 background-position:-160px -194px
}
.gear-icon.gear-icon-small.gear-icon-tier11:before {
 background-position:-200px -194px
}
.gear-icon.gear-icon-small.gear-icon-tier12:before {
 background-position:-240px -194px
}
.gear-icon .gear-icon-img {
 width:50px;
 height:50px
}
.gear-icon.gear-icon-tier1:before {
 background-position:-50px -144px
}
.gear-icon.gear-icon-tier2:before {
 background-position:-100px -144px
}
.gear-icon.gear-icon-tier4:before {
 background-position:-150px -144px
}
.gear-icon.gear-icon-tier7:before {
 background-position:-200px -144px
}
.gear-icon.gear-icon-tier11:before {
 background-position:-250px -144px
}
.gear-icon.gear-icon-tier12:before {
 background-position:-300px -144px
}
.gear-icon.gear-icon-medium {
 width:64px;
 height:64px
}
.gear-icon.gear-icon-medium .gear-icon-img {
 width:64px;
 height:64px
}
.gear-icon.gear-icon-medium.gear-icon-tier1:before {
 background-position:-64px -80px
}
.gear-icon.gear-icon-medium.gear-icon-tier2:before {
 background-position:-128px -80px
}
.gear-icon.gear-icon-medium.gear-icon-tier4:before {
 background-position:-192px -80px
}
.gear-icon.gear-icon-medium.gear-icon-tier7:before {
 background-position:-256px -80px
}
.gear-icon.gear-icon-medium.gear-icon-tier11:before {
 background-position:-320px -80px
}
.gear-icon.gear-icon-medium.gear-icon-tier12:before {
 background-position:-384px -80px
}
.gear-icon.gear-icon-large {
 width:80px;
 height:80px
}
.gear-icon.gear-icon-large .gear-icon-img {
 width:80px;
 height:80px
}
.gear-icon.gear-icon-large.gear-icon-tier1:before {
 background-position:-80px 0
}
.gear-icon.gear-icon-large.gear-icon-tier2:before {
 background-position:-160px 0
}
.gear-icon.gear-icon-large.gear-icon-tier4:before {
 background-position:-240px 0
}
.gear-icon.gear-icon-large.gear-icon-tier7:before {
 background-position:-320px 0
}
.gear-icon.gear-icon-large.gear-icon-tier11:before {
 background-position:-400px 0
}
.gear-icon.gear-icon-large.gear-icon-tier12:before {
 background-position:-480px 0
}
.gear-icon.gear-icon-large .gear-icon-inner {
 border-radius:20px 2px 20px 14px
}
.gear-icon.gear-icon-large .gear-icon-mk-level {
 font-size:14px;
 font-weight:700;
 right:4px;
 top:4px
}
.gear-icon-link {
 position:absolute;
 top:0;
 left:0;
 right:0;
 bottom:0;
 z-index:3
}
.gear-icon-inner {
 display:block;
 background:radial-gradient(#aaa,black 80%);
 border-radius:13px 0 13px 7px;
 overflow:hidden
}
.gear-icon-tier1 .gear-icon-inner {
 background:radial-gradient(#4391a3,black 80%)
}
.gear-icon-tier2 .gear-icon-inner {
 background:radial-gradient(#4c9601,black 80%)
}
.gear-icon-tier4 .gear-icon-inner {
 background:radial-gradient(#004b65,black 80%)
}
.gear-icon-tier7 .gear-icon-inner {
 background:radial-gradient(#4700a7,black 80%)
}
.gear-icon-tier11 .gear-icon-inner {
 background:radial-gradient(#4700a7,black 80%)
}
.gear-icon-tier12 .gear-icon-inner {
 background:radial-gradient(#997300,black 80%)
}
.gear-icon-mk-level {
 position:absolute;
 right:2px;
 top:2px;
 color:#fff;
 z-index:10;
 font-size:8px;
 text-shadow:0 2px 2px #000;
 background-color:rgba(0,0,0,.3);
 padding:3px 3px 0;
 line-height:1
}

</style>
@endpush


@section('content')
        @include('player.home._nav')
            <!-- <p class="text-left">{{ __('app.howto.click_head') }}</p> -->

<div class="card mb-2">
    <h5 class="card-header">{{ __('Toons') }} - {{ __('Gear Check') }}</h5>
    <div class="card-body">
        <table class="table table-sm table-hover table-responsive">
        @php($stats = [])
        @foreach($chars ?? [] as $char)
            @if($loop->first)
                <thead><tr>
                <th>{{ __('Character') }}</th>
                @foreach($char['gear_levels'] as $gear_level)
                <th>{{ $gear_level['tier'] ?? '-' }}</th>
                @php($stats['tiers'][$gear_level['tier']] = [])
                @endforeach
                <td>-</td></tr></thead><tbody>
            @endif
        <tr>
        <td>{{ $char['name'] ?? '-' }}</td>
        @foreach($char['gear_levels'] as $gear_level)
        <td>
        @if($gear_level['tier'] > $char_list[$char['base_id']]['tier'])
            {{-- implode(', ', $gear_level['gear'] ?? []) --}}
            @foreach($gear_level['gear'] as $key => $item)
            @include('layouts.img._gear-icon-small', ['gi_gear' => $gear[$item]])
            @php($stats['tiers'][$gear_level['tier']][$item] = 1 + ($stats['tiers'][$gear_level['tier']][$item] ?? 0))
            @php($stats['chars'][$char['base_id']][$item] = 1 + ($stats['chars'][$char['base_id']][$item] ?? 0))
            @php($stats['sum'][$item] = 1 + ($stats['sum'][$item] ?? 0))
            @endforeach
        @elseif($gear_level['tier'] == $char_list[$char['base_id']]['tier'])
            @foreach($gear_level['gear'] as $key => $item)
            @if(!in_array($key + 1, $char_list[$char['base_id']]['gear']))
            @include('layouts.img._gear-icon-small', ['gi_gear' => $gear[$item]])
            {{-- $item --}}
            @php($stats['tiers'][$gear_level['tier']][$item] = 1 + ($stats['tiers'][$gear_level['tier']][$item] ?? 0))
            @php($stats['chars'][$char['base_id']][$item] = 1 + ($stats['chars'][$char['base_id']][$item] ?? 0))
            @php($stats['sum'][$item] = 1 + ($stats['sum'][$item] ?? 0))
            @endif
            @endforeach
        @else
        OK
        @endif
        </td>
        @endforeach
        <td>-</td>
        </tr>
        @endforeach
        @isset($stats['tiers'])
        <tr><td></td>
        @foreach($stats['tiers'] as $key => $tier)
        <td>
        @php(arsort($tier))
        @php($stats['materials'][$key] = [])
        @foreach($tier as $id => $amount)
            <div style="clear:both;">
            @include('layouts.img._gear-icon-small', ['gi_gear' => $gear[$id], 'gi_amount' => $amount . 'x'])
            @foreach($gear[$id]['mat_list'] ?? [] as $mat_id => $mat_amount)
            @include('layouts.img._gear-icon-micro', ['gi_gear' => $gear[$mat_id], 'gi_amount' => $mat_amount . 'x'])
            @php($stats['materials'][$key][$mat_id] = ($amount * $mat_amount) + ($stats['materials'][$key][$mat_id] ?? 0))
            @endforeach
            </div>
        @endforeach
        </td>
        @endforeach
        <td>{{-- var_dump($stats['sum'] ?? '') --}}</td></tr>
        <tr><td></td>
        @foreach($stats['materials'] as $key => $tier)
        <td>
        @php(arsort($tier))
        @foreach($tier as $id => $amount)
            @include('layouts.img._gear-icon-small', ['gi_gear' => $gear[$id], 'gi_amount' => $amount . 'x'])
        @endforeach
        </td>
        @endforeach
        <td>-</td></tr>
        </tbody>
        @endisset
        </table>
    </div>
</div>

<p>{{-- var_dump($gear) --}}</p>

@endsection
