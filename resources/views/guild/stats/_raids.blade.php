@switch($key)
                    @case('rancor')
<div class="card mb-2">
<img class="card-img-top" src="{{ asset('images/assets/tex.guild_raids_rancor.jpg') }}" alt="Heroic Rancor">
<h5 class="card-header">{{ __('Heroic Rancor') }} ({{ __('easy') }}, {{ __('auto solo') }})</h5>
<div class="card-body">
<p>{{ __('app.stats.rancor_intro') }} {!! __('app.stats.tiers', ['count' => '7']) !!} {!! __('app.stats.short_name', ['name' => 'HPIT, HRancor']) !!}</p>
<p>{!! __('app.stats.requirements', ['name' => 'HPIT', 'rarity' => $team['rarity'] ?? '', 'level' => $team['level'] ?? '', 'gear' => $team['gear'] ?? '']) !!}</p>
<p>{!! __('app.stats.auto_solo_prepared', ['name' => 'HPIT', 'count' => '<span class="badge badge-pill badge-primary">'. count($eventStats[$key][0] ?? []) .'</span>*)']) !!}
    {!! __('app.stats.auto_solo_info', ['max' => '10.304.366', 'footnote' => '***)']) !!}
    {!! __('app.stats.auto_solo_soon', ['name' => 'HPIT', 'count' => '<span class="badge badge-pill badge-primary">'. count($eventStats[$key][1] ?? []) .'</span>**)']) !!}
    {{ __('app.stats.rancor_info') }}
</p>
<p><em>* {{ implode(', ', $eventStats[$key][0] ?? []) }}</em>
<br /><em>** {{ implode(', ', $eventStats[$key][1] ?? []) }}</em>
<br /><em>*** {{ __('app.stats.equal_damage') }}</em></p>
</div>
<div class="card-footer">
<div class="progress">
  <!-- <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div> -->
  <div class="progress-bar bg-success" role="progressbar" style="width: {{ round(count($eventStats[$key][0] ?? []) / count($members ?? []) * 100, 1) }}%" aria-valuenow="{{ round(count($eventStats[$key][0] ?? []) / count($members ?? []) * 100, 1) }}" aria-valuemin="0" aria-valuemax="100">{{ round(count($eventStats[$key][0] ?? []) / count($members ?? []) * 100, 1) }} %</div>
  <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: {{ round(count($eventStats[$key][1] ?? []) / count($members ?? []) * 100, 1) }}%" aria-valuenow="{{ round(count($eventStats[$key][1] ?? []) / count($members ?? []) * 100, 1) }}" aria-valuemin="0" aria-valuemax="100">{{ round(count($eventStats[$key][1] ?? []) / count($members ?? []) * 100, 1) }} %</div>
</div>
</div>
</div>
                    @break

                    @case('haat')
<div class="card mb-2">
<img class="card-img-top" src="{{ asset('images/assets/tex.guild_raids_aat.jpg') }}" alt="Heroic Tank">
<h5 class="card-header">{{ __('Heroic Tank') }} ({{ __('challenging') }}, {{ __('solo') }})</h5>
<div class="card-body">
<p>{{ __('app.stats.tank_intro') }} {!! __('app.stats.tiers', ['count' => '2']) !!} {!! __('app.stats.short_name', ['name' => 'HAAT, HTank']) !!}</p>
<p>{!! __('app.stats.requirements', ['name' => 'HAAT', 'rarity' => $team['rarity'] ?? '', 'level' => $team['level'] ?? '', 'gear' => $team['gear'] ?? '']) !!}</p>
<p>{!! __('app.stats.solo_prepared', ['name' => 'HAAT', 'count' => '<span class="badge badge-pill badge-primary">'. count($eventStats[$key][0] ?? []) .'</span>*)']) !!}
    {!! __('app.stats.solo_info', ['max' => '48.346.357', 'footnote' => '***)']) !!}
    {!! __('app.stats.solo_soon', ['name' => 'HAAT', 'count' => '<span class="badge badge-pill badge-primary">'. count($eventStats[$key][1] ?? []) .'</span>**)']) !!}
    {{ __('app.stats.tank_info') }}
</p>
<p></p>
<p><em>* {{ implode(', ', $eventStats[$key][0] ?? []) }}</em>
<br /><em>** {{ implode(', ', $eventStats[$key][1] ?? []) }}</em>
<br /><em>*** {{ __('app.stats.equal_damage') }}</em></p>
</div>
<div class="card-footer">
<div class="progress">
  <!-- <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div> -->
  <div class="progress-bar bg-success" role="progressbar" style="width: {{ round(count($eventStats[$key][0] ?? []) / count($members ?? []) * 100, 1) }}%" aria-valuenow="{{ round(count($eventStats[$key][0] ?? []) / count($members ?? []) * 100, 1) }}" aria-valuemin="0" aria-valuemax="100">{{ round(count($eventStats[$key][0] ?? []) / count($members ?? []) * 100, 1) }} %</div>
  <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: {{ round(count($eventStats[$key][1] ?? []) / count($members ?? []) * 100, 1) }}%" aria-valuenow="{{ round(count($eventStats[$key][1] ?? []) / count($members ?? []) * 100, 1) }}" aria-valuemin="0" aria-valuemax="100">{{ round(count($eventStats[$key][1] ?? []) / count($members ?? []) * 100, 1) }} %</div>
</div>
</div>
</div>

                    @break

                    @case('sith')
<div class="card mb-2">
<img class="card-img-top" src="{{ asset('images/assets/tex.guild_raids_triumvirate.jpg') }}" alt="Heroic Sith">
<h5 class="card-header">{{ __('Heroic Sith Triumvirat') }} ({{ __('adventurous') }})</h5>
<div class="card-body">
<p>{!! __('app.stats.sith_intro') !!}</p>
<p>{!! __('app.stats.requirements', ['name' => 'HSTR', 'rarity' => $team['rarity'] ?? '', 'level' => $team['level'] ?? '', 'gear' => $team['gear'] ?? '']) !!}</p>
<p>{!! __('app.stats.sith_info') !!}</p>
@foreach($eventStats[$key] ?? [] as $eventStatsKey => $eventStatsValue)
<h5>
    {!! $team['phase'][$eventStatsKey]['name'] ?? '' !!}
</h5>
<p>
    {!! __('app.stats.sith_prepared', [
        'count' => '<span class="badge badge-pill badge-primary">'. count($eventStatsValue[0] ?? []) .'</span>',
        'footnote' => '<small style="vertical-align:top;">'. $loop->iteration .'a)</small>',
        'damage' => number_format($sithDamage[$eventStatsKey][0]['DMG'] ?? 0),
        ]) !!}
    {!! __('app.stats.sith_soon', [
        'count' => '<span class="badge badge-pill badge-primary">'. count($eventStatsValue[1] ?? []) .'</span>',
        'footnote' => '<small style="vertical-align:top;">'. $loop->iteration .'b)</small>',
        'damage' => number_format($sithDamage[$eventStatsKey][1]['DMG'] ?? 0),
        ]) !!}
    {!! __('app.stats.sith_health', ['health' => number_format($sithDamage[$eventStatsKey][999]['DMG'] ?? 0)]) !!}
<div class="progress">
@php($sumProgress = 0)
    @foreach($eventStatsValue[0] ?? [] as $eventStatsValueKey => $eventStatsValueValue)
        @php($curDMG_100 = $sithSquads[$eventStatsKey][0][$eventStatsValueKey][0]['DMG_100'] ?? 0)
        @if($curDMG_100 + $sumProgress < 100)
        <div class="progress-bar bg-success" role="progressbar"
        style="width: {{ $curDMG_100 }}%"
        aria-valuenow="{{ $curDMG_100 }}" aria-valuemin="0" aria-valuemax="100">
        {{ round( ($sithSquads[$eventStatsKey][0][$eventStatsValueKey][0]['DMG'] ?? 0) / 1000000 , 1) }}M
        ({{ $curDMG_100 }}%)</div>
        @elseif($sumProgress < 100)
        <div class="progress-bar bg-success" role="progressbar"
        style="width: {{ 100 - $sumProgress }}%"
        aria-valuenow="{{ $curDMG_100 }}" aria-valuemin="0" aria-valuemax="100">
        {{ round( ($sithSquads[$eventStatsKey][0][$eventStatsValueKey][0]['DMG'] ?? 0) / 1000000 , 1) }}M
        ({{ $curDMG_100 }}%) <i class="fa fa-angle-double-right" style="position:absolute;right:25px;"></i></div>
        @endif
        @php($sumProgress += $curDMG_100)
    @endforeach
    @foreach($eventStatsValue[1] ?? [] as $eventStatsValueKey => $eventStatsValueValue)
        @php($curDMG_100 = $sithSquads[$eventStatsKey][1][$eventStatsValueKey][0]['DMG_100'] ?? 0)
        @if($curDMG_100 + $sumProgress < 100)
        <div class="progress-bar bg-warning text-dark" role="progressbar"
        style="width: {{ $curDMG_100 }}%"
        aria-valuenow="{{ $curDMG_100 }}" aria-valuemin="0" aria-valuemax="100">
        {{ round( ($sithSquads[$eventStatsKey][1][$eventStatsValueKey][0]['DMG'] ?? 0) / 1000000 , 1) }}M
        ({{ $curDMG_100 }}%)</div>
        @elseif($sumProgress < 100)
        <div class="progress-bar bg-warning text-dark" role="progressbar"
        style="width: {{ 100 - $sumProgress }}%"
        aria-valuenow="{{ $curDMG_100 }}" aria-valuemin="0" aria-valuemax="100">
        {{ round(($sithSquads[$eventStatsKey][1][$eventStatsValueKey][0]['DMG'] ?? 0) / 1000000 , 1) }}M
        ({{ $curDMG_100 }}%) <i class="fa fa-angle-double-right text-dark" style="position:absolute;right:25px;"></i></div>
        @endif
        @php($sumProgress += $curDMG_100)
    @endforeach
</div>
</p>
@endforeach

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

@foreach($eventStats[$key] ?? [] as $eventStatsKey => $eventStatsValue)
<p>
<em>{{ $loop->iteration }}a
@foreach($eventStatsValue[0] ?? [] as $eventStatsValueKey => $eventStatsValueValue)
@if(!$loop->first), @endif
{{ $eventStatsValueValue }} ({{ preg_split('/\s/', $sithSquads[$eventStatsKey][0][$eventStatsValueKey][0]['note'] ?? '')[0] }}, {{ $sithSquads[$eventStatsKey][0][$eventStatsValueKey][0]['name'] ?? '' }})
@endforeach
</em>
<br /><em>{{ $loop->iteration }}b
@foreach($eventStatsValue[1] ?? [] as $eventStatsValueKey => $eventStatsValueValue)
@if(!$loop->first), @endif
{{ $eventStatsValueValue }} ({{ preg_split('/\s/', $sithSquads[$eventStatsKey][1][$eventStatsValueKey][0]['note'] ?? '')[0] }}, {{ $sithSquads[$eventStatsKey][1][$eventStatsValueKey][0]['name'] ?? '' }})
@endforeach
 </em>
</p>
@endforeach
</div>
<div class="card-footer">
    {{ __('app.stats.sith_progress_count_info') }}
    @foreach($eventStats[$key] ?? [] as $eventStatsKey => $eventStatsValue)
    @if(!$loop->first)<br />@endif
    <div class="progress">
    <div class="progress-bar bg-success" role="progressbar" style="width: {{ round(count($eventStatsValue[0] ?? []) / count($members ?? []) * 100, 1) }}%" aria-valuenow="{{ round(count($eventStatsValue[0] ?? []) / count($members ?? []) * 100, 1) }}" aria-valuemin="0" aria-valuemax="100">{{ round(count($eventStatsValue[0] ?? []) / count($members ?? []) * 100, 1) }} %</div>
    <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: {{ round(count($eventStatsValue[1] ?? []) / count($members ?? []) * 100, 1) }}%" aria-valuenow="{{ round(count($eventStatsValue[1] ?? []) / count($members ?? []) * 100, 1) }}" aria-valuemin="0" aria-valuemax="100">{{ round(count($eventStatsValue[1] ?? []) / count($members ?? []) * 100, 1) }} %</div>
    </div>
    @endforeach
</div>
</div>

                    @break


                    @default
                @endswitch
