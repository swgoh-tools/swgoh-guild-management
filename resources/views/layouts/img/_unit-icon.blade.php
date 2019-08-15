@if ($ui_unit)
@php
    if($ui_small ?? false) {$ui_class = 'sprite-units--small';}
    elseif($ui_micro ?? false) {$ui_class = 'sprite-units--micro';}
    else {$ui_class = 'sprite-units';}
    $ui_sprite = "$ui_class " . preg_filter('~^.*/(\w+)/(\w+)/?$~', '$1-$2', $ui_unit['image'] );
@endphp
<div class="player-char-portrait char-portrait-full-micro char-portrait-full-gear-t{{ $ui_stats['gear'] ?? 0 }}">
<a href="{{ $ui_unit['url'] ?? '' }}" class="char-portrait-full-link" rel="nofollow" title="{{ $ui_stats['nameKey'] ?? $ui_unit['name'] }} - {{ $ui_unit['description'] ?? '' }}">
        {{-- <img class="char-portrait-full-img loading" src="/game-asset/u/ENFYSNEST/" alt="{{ $ui_stats['nameKey'] ?? $ui_unit['name'] }}" width="80" height="80"> --}}
        {{-- <img class="char-portrait-full-img loading" src="{{ $ui_unit['image'] ?? '' }}" alt="{{ $ui_stats['nameKey'] ?? $ui_unit['name'] }}" width="80" height="80"> --}}
        <div class="char-portrait-full-img {{ $ui_sprite }}"></div>
<div class="char-portrait-full-gear"></div>
<div class="star star1 @if(($ui_stats['rarity'] ?? 0) < 1)star-inactive @endif"></div>
<div class="star star2 @if(($ui_stats['rarity'] ?? 0) < 2)star-inactive @endif"></div>
<div class="star star3 @if(($ui_stats['rarity'] ?? 0) < 3)star-inactive @endif"></div>
<div class="star star4 @if(($ui_stats['rarity'] ?? 0) < 4)star-inactive @endif"></div>
<div class="star star5 @if(($ui_stats['rarity'] ?? 0) < 5)star-inactive @endif"></div>
<div class="star star6 @if(($ui_stats['rarity'] ?? 0) < 6)star-inactive @endif"></div>
<div class="star star7 @if(($ui_stats['rarity'] ?? 0) < 7)star-inactive @endif"></div>
<div class="char-portrait-full-level">{{ $ui_stats['level'] ?? '' }}</div>
<div class="char-portrait-full-gear-level">{{ $ui_stats['gear'] ?? '' }}</div>
</a>
</div>
@endif
