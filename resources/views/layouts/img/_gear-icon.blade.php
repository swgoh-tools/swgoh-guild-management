@if ($gi_gear)
@php
    if($gi_small ?? false) {$gi_class = 'sprite-gear--small';}
    elseif($gi_micro ?? false) {$gi_class = 'sprite-gear--micro';}
    else {$gi_class = 'sprite-gear';}
    $gi_sprite = "$gi_class " . preg_filter('~^.*/(\w+)/(\w+)/?$~', '$1-$2', $gi_gear['image'] );
@endphp
    <a href="{{ $gi_gear['url'] }}" title="{{ $gi_name ?? $gi_gear['name'] }}"><div class="pull-left">{{ $gi_amount ?? '' }}<span class="gear-icon gear-icon-tier{{ $gi_gear['tier'] }}
    @if($gi_small ?? false)gear-icon-small @elseif($gi_micro ?? false)gear-icon-micro @endif"><span class="gear-icon-inner"><div class="gear-icon-img {{ $gi_sprite }}"></div><span class="gear-icon-mk-level">{{ $gi_gear['mark'] }}</span></span></span></div></a>
@endif
{{-- <img class="gear-icon-img" src="{{ $gi_gear['image'] }}" alt="{{ $gi_gear['name'] }}"> --}}
