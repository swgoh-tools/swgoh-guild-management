@if ($ui_unit)
@php
$ui_sprite_class = 'sprite-units';
$ui_div_class = [
'main' => 'player-char-portrait',
'size' => 'char-portrait-full',
'gear' => 'char-portrait-full-gear-t' . ($ui_stats['gear'] ?? 0),
'side' => 'char-portrait-full-alignment-neutral',
];
switch ($ui_unit['alignment'] ?? '') {
case 'Dark Side':
case 'DARK':
$ui_div_class['side'] = 'char-portrait-full-alignment-dark-side';
break;

case 'Light Side':
case 'LIGHT':
$ui_div_class['side'] = 'char-portrait-full-alignment-light-side';
break;
}
if($ui_small ?? false) {
$ui_sprite_class = 'sprite-units--small';
$ui_div_class['size'] = 'char-portrait-full-small';
} elseif($ui_micro ?? false) {
$ui_sprite_class = 'sprite-units--micro';
$ui_div_class['size'] = 'char-portrait-full-micro';
}
$ui_show_stats = $ui_show_stats ?? false;
$ui_sprite = "$ui_sprite_class " . preg_filter('~^.*/(\w+)/(\w+)/?$~', '$1-$2', $ui_unit['image'] );

$ui_zeta_count = 0;
foreach ($ui_stats['skills'] ?? [] as $skill) {
if(($skill['tier'] ?? 0) == 8 && ($skill['isZeta'] ?? false)) {
$ui_zeta_count++;
}
}
@endphp
<div style="display:inline-block; vertical-align: top;">
    <div class="{{ implode(' ', $ui_div_class) }} mt-2">
        @if(($ui_stats['rarity'] ?? 0) < 1)<div style="opacity:0.4;"> @endif
            <a href="{{ $ui_unit['url'] ?? '' }}" class="char-portrait-full-link" rel="nofollow"
                title="{{ $ui_stats['nameKey'] ?? $ui_unit['name'] }} - {{ $ui_unit['description'] ?? '' }}">
                {{-- <img class="char-portrait-full-img loading" src="/game-asset/u/ENFYSNEST/" alt="{{ $ui_stats['nameKey'] ?? $ui_unit['name'] }}"
                width="80" height="80"> --}}
                {{-- <img class="char-portrait-full-img loading" src="{{ $ui_unit['image'] ?? '' }}"
                alt="{{ $ui_stats['nameKey'] ?? $ui_unit['name'] }}" width="80" height="80"> --}}
                <div class="char-portrait-full-img {{ $ui_sprite }}"></div>
                <div class="char-portrait-full-gear"></div>
                <div class="star star1 @if(($ui_stats['rarity'] ?? 0) < 1)star-inactive @endif"></div>
                <div class="star star2 @if(($ui_stats['rarity'] ?? 0) < 2)star-inactive @endif"></div>
                <div class="star star3 @if(($ui_stats['rarity'] ?? 0) < 3)star-inactive @endif"></div>
                <div class="star star4 @if(($ui_stats['rarity'] ?? 0) < 4)star-inactive @endif"></div>
                <div class="star star5 @if(($ui_stats['rarity'] ?? 0) < 5)star-inactive @endif"></div>
                <div class="star star6 @if(($ui_stats['rarity'] ?? 0) < 6)star-inactive @endif"></div>
                <div class="star star7 @if(($ui_stats['rarity'] ?? 0) < 7)star-inactive @endif"></div>
                <div class="char-portrait-full-level">{{ $ui_stats['level'] ?? 0 }}</div>
                @if($ui_zeta_count > 0)<div class="char-portrait-full-zeta">{{ $ui_zeta_count }}</div>@endif
                @if(($ui_stats['relic']['currentTier'] ?? 0) > 2)<div class="char-portrait-full-relic">
                    {{ $ui_stats['relic']['currentTier'] - 2 }}</div>@endif
                {{-- <div class="char-portrait-full-gear-level">{{ $ui_stats['gear'] ?? 0 }}</div> --}}
    </a>
    @if(($ui_stats['rarity'] ?? 0) < 1)</div> @endif </div> @if($ui_show_stats) <div class="text-muted mt-2">
        {{ $ui_stats['gp'] ?? '' }}
</div>
@if($ui_stats['skills'] ?? false)
<div>
    @foreach($ui_stats['skills'] as $skill)
    @include('layouts.img._skill-icon-compact', ['si_skill' => $skill, 'si_skillKeys' => $skillKeys])
    <br>
    @endforeach
</div>
@endif

@if($ui_stats['mods'] ?? false)
<div>
    {{-- @for ($i = 0; $i < 6; $i++) @if ($stat[$i] ?? null) @include('layouts.img._mod-icon-small', ['mi_mod'=>
            $stat[$i]])
            @else
            @include('layouts.img._mod-icon-small', ['mi_mod' => ['slot' => $i]])
            @endif
            @endfor --}}
</div>
@endif
@endif
</div>
@endif
