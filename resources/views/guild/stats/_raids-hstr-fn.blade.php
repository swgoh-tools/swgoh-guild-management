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
@if(1 === ($eventStatsMax[$key][$eventStatsKey][$eventStatsValueKey] ?? null))
@if(!$loop->first), @endif
{{ $eventStatsValueValue }} ({{ preg_split('/\s/', $sithSquads[$eventStatsKey][1][$eventStatsValueKey][0]['note'] ?? '')[0] }}, {{ $sithSquads[$eventStatsKey][1][$eventStatsValueKey][0]['name'] ?? '' }})
@endif
@endforeach
 </em>
</p>
@endforeach
