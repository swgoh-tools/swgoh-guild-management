<!-- Phases that are not defined -->
@if(count($eventStats[$key] ?? []) < 5)
<h5>
    PHASE 4 - DARTH TRAYA - DARTH SION
</h5>
<p>
{{ __('app.stats.sith_undefined') }}
{!! __('app.stats.sith_health', ['health' => number_format($sithDamage[4][999]['DMG'] ?? 0)]) !!}
</p>
@endif
@if(count($eventStats[$key] ?? []) < 6)
<h5>
    PHASE 4 - DARTH TRAYA - DARTH TRAYA
</h5>
<p>
{{ __('app.stats.sith_undefined') }}
{!! __('app.stats.sith_health', ['health' => number_format($sithDamage[5][999]['DMG'] ?? 0)]) !!}
</p>
@endif
