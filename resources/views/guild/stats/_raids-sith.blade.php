<div class="card mb-2">
<img class="card-img-top" src="{{ asset('images/assets/tex.guild_raids_triumvirate.jpg') }}" alt="Heroic Sith">
<h5 class="card-header">{{ __('Heroic Sith Triumvirat') }} ({{ __('adventurous') }})</h5>
<div class="card-body">
<p>{!! __('app.stats.sith_intro') !!}</p>
<p>{!! __('app.stats.requirements', ['name' => 'HSTR', 'rarity' => $team['rarity'] ?? '', 'level' => $team['level'] ?? '', 'gear' => $team['gear'] ?? '']) !!}</p>
<p>{!! __('app.stats.sith_info') !!}</p>
@foreach($eventStats[$key] ?? [] as $esPhaseKey => $esPhaseValue)
@php($countBest = array_count_values($eventStatsMax[$key][$esPhaseKey] ?? []))
<h5>
    {!! $team['phase'][$esPhaseKey]['name'] ?? '' !!}
</h5>
<p>
    {!! __('app.stats.sith_prepared', [
        'count' => '<span class="badge badge-pill badge-primary">'. ($countBest[0] ?? 0) .'</span>',
        'footnote' => '<small style="vertical-align:top;">'. $loop->iteration .'a)</small>',
        'damage' => number_format($sithDamage[$esPhaseKey][0]['DMG'] ?? 0),
        ]) !!}
    {!! __('app.stats.sith_soon', [
        'count' => '<span class="badge badge-pill badge-primary">'. ($countBest[1] ?? 0) .'</span>',
        'footnote' => '<small style="vertical-align:top;">'. $loop->iteration .'b)</small>',
        'damage' => number_format($sithDamage[$esPhaseKey][1]['DMG'] ?? 0),
        ]) !!}
    {!! __('app.stats.sith_health', ['health' => number_format($sithDamage[$esPhaseKey][999]['DMG'] ?? 0)]) !!}

</p>

@if($detail)
@include('guild.stats._raids-hstr-single')
@elseif('raid-hstr' == $selection)
@include('guild.stats._raids-hstr-sum')
@else
<p>
@include('guild.stats._raids-hstr-bar')
</p>
@endif

@endforeach

@include('guild.stats._raids-hstr-undefined')

@foreach($eventStats[$key] ?? [] as $esPhaseKey => $esPhaseValue)
<p>
<em>{{ $loop->iteration }}a
@foreach($esPhaseValue[0] ?? [] as $eventStatsValueKey => $eventStatsValueValue)
@if(!$loop->first), @endif
{{ $eventStatsValueValue }} ({{ preg_split('/\s/', $sithSquads[$esPhaseKey][0][$eventStatsValueKey][0]['note'] ?? '')[0] }}, {{ $sithSquads[$esPhaseKey][0][$eventStatsValueKey][0]['name'] ?? '' }})
@endforeach
</em>
<br /><em>{{ $loop->iteration }}b
@foreach($esPhaseValue[1] ?? [] as $eventStatsValueKey => $eventStatsValueValue)
@if(1 === ($eventStatsMax[$key][$esPhaseKey][$eventStatsValueKey] ?? null))
@if(!$loop->first), @endif
{{ $eventStatsValueValue }} ({{ preg_split('/\s/', $sithSquads[$esPhaseKey][1][$eventStatsValueKey][0]['note'] ?? '')[0] }}, {{ $sithSquads[$esPhaseKey][1][$eventStatsValueKey][0]['name'] ?? '' }})
@endif
@endforeach
 </em>
</p>
@endforeach
</div>
<div class="card-footer">
    {{ __('app.stats.sith_progress_count_info') }}
    @foreach($eventStats[$key] ?? [] as $esPhaseKey => $esPhaseValue)
    @if(!$loop->first)<br />@endif
    <div class="progress">
    <div class="progress-bar bg-success" role="progressbar" style="width: {{ round(count($esPhaseValue[0] ?? []) / count($members ?? []) * 100, 1) }}%" aria-valuenow="{{ round(count($esPhaseValue[0] ?? []) / count($members ?? []) * 100, 1) }}" aria-valuemin="0" aria-valuemax="100">{{ round(count($esPhaseValue[0] ?? []) / count($members ?? []) * 100, 1) }} %</div>
    <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: {{ round(count($esPhaseValue[1] ?? []) / count($members ?? []) * 100, 1) }}%" aria-valuenow="{{ round(count($esPhaseValue[1] ?? []) / count($members ?? []) * 100, 1) }}" aria-valuemin="0" aria-valuemax="100">{{ round(count($esPhaseValue[1] ?? []) / count($members ?? []) * 100, 1) }} %</div>
    </div>
    @endforeach
</div>
</div>
