<a href="{{ $gi_gear['url'] }}"><div class="pull-left">{{ $gi_amount ?? '' }}<span class="gear-icon gear-icon-tier{{ $gi_gear['tier'] }}
@if($gi_small ?? false)gear-icon-small @elseif($gi_micro ?? false)gear-icon-micro @endif"><span class="gear-icon-inner"><img class="gear-icon-img" src="{{ $gi_gear['image'] }}" alt="{{ $gi_gear['name'] }}"><span class="gear-icon-mk-level">{{ $gi_gear['mark'] }}</span></span></span></div></a>