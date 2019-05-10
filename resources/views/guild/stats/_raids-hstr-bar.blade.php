<div class="progress">
@php($sumProgress = 0)
    @foreach($esPhaseValue[0] ?? [] as $eventStatsValueKey => $eventStatsValueValue)
        @php($curDMG_100 = $sithSquads[$esPhaseKey][0][$eventStatsValueKey][0]['DMG_100'] ?? 0)
        @if($curDMG_100 + $sumProgress < 100)
        <div class="progress-bar bg-success" role="progressbar"
        style="width: {{ $curDMG_100 }}%"
        aria-valuenow="{{ $curDMG_100 }}" aria-valuemin="0" aria-valuemax="100">
        {{ round( ($sithSquads[$esPhaseKey][0][$eventStatsValueKey][0]['DMG'] ?? 0) / 1000000 , 1) }}M
        ({{ $curDMG_100 }}%)</div>
        @elseif($sumProgress < 100)
        <div class="progress-bar bg-success" role="progressbar"
        style="width: {{ 100 - $sumProgress }}%"
        aria-valuenow="{{ $curDMG_100 }}" aria-valuemin="0" aria-valuemax="100">
        {{ round( ($sithSquads[$esPhaseKey][0][$eventStatsValueKey][0]['DMG'] ?? 0) / 1000000 , 1) }}M
        ({{ $curDMG_100 }}%) <i class="fa fa-angle-double-right" style="position:absolute;right:25px;"></i></div>
        @endif
        @php($sumProgress += $curDMG_100)
    @endforeach
    @foreach($esPhaseValue[1] ?? [] as $eventStatsValueKey => $eventStatsValueValue)
        @php($curDMG_100 = $sithSquads[$esPhaseKey][1][$eventStatsValueKey][0]['DMG_100'] ?? 0)
        @if($curDMG_100 + $sumProgress < 100)
        <div class="progress-bar bg-warning text-dark" role="progressbar"
        style="width: {{ $curDMG_100 }}%"
        aria-valuenow="{{ $curDMG_100 }}" aria-valuemin="0" aria-valuemax="100">
        {{ round( ($sithSquads[$esPhaseKey][1][$eventStatsValueKey][0]['DMG'] ?? 0) / 1000000 , 1) }}M
        ({{ $curDMG_100 }}%)</div>
        @elseif($sumProgress < 100)
        <div class="progress-bar bg-warning text-dark" role="progressbar"
        style="width: {{ 100 - $sumProgress }}%"
        aria-valuenow="{{ $curDMG_100 }}" aria-valuemin="0" aria-valuemax="100">
        {{ round(($sithSquads[$esPhaseKey][1][$eventStatsValueKey][0]['DMG'] ?? 0) / 1000000 , 1) }}M
        ({{ $curDMG_100 }}%) <i class="fa fa-angle-double-right text-dark" style="position:absolute;right:25px;"></i></div>
        @endif
        @php($sumProgress += $curDMG_100)
    @endforeach
</div>
