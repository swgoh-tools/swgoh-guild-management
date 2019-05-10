<table class="table table-sm table-hover table-striped w-auto"><tr>
    <th>Name</th>
    <th>Schaden</th>
    <th>Prozent</th>
    <th>Team</th>
    <th>Note</th>
    <th>Schaden (kum.)</th>
    <th>Prozent (kum.)</th>
    <th>Readyness</th>
    </tr>
@php($sumProgress = 0)
@php($sumProgressTotal = 0)
@php($dupCheckList = [])
@php(ksort($esPhaseValue))
@foreach($esPhaseValue ?? [] as $esReadyKey => $esReadyValue)

@if($esReadyKey < 5)

@foreach($esReadyValue ?? [] as $esCode => $esName)

@empty($dupCheckList[$esCode])

@php($curDMG_100 = $sithSquads[$esPhaseKey][$esReadyKey][$esCode][0]['DMG_100'] ?? 0)
@php($curDMG = $sithSquads[$esPhaseKey][$esReadyKey][$esCode][0]['DMG'] ?? 0)
    @php($sumProgress += $curDMG_100)
    @php($sumProgressTotal += $curDMG)
    @switch($sithSquads[$esPhaseKey][$esReadyKey][$esCode][0]['readiness'] ?? -1)
        @case(0)
        @php($curTableClass = 'table-success')
        @break
        @case(1)
        @case(2)
        @php($curTableClass = 'table-warning')
        @break
        @default
        @php($curTableClass = 'table-danger')
    @endswitch
<tr class='{{ $curTableClass }}'>
    <td><a href="{{ route('guild.stats', $guild) }}/raid-hstr/{{ $esCode }}">{{ $esName }}</a></td>
    <td>{{ round( $curDMG / 1000000 , 1) }}M</td>
    <td>{{ $curDMG_100 }}%</td>
    <td>{{ $sithSquads[$esPhaseKey][$esReadyKey][$esCode][0]['name'] ?? '' }}</td>
    <td>{{ preg_split('/\s/', $sithSquads[$esPhaseKey][$esReadyKey][$esCode][0]['note'] ?? '')[0] }}</td>
    <td>{{ round( $sumProgressTotal / 1000000 , 1) }}M</td>
    <td>{{ $sumProgress }}%</td>
    <td>{{ $sithSquads[$esPhaseKey][$esReadyKey][$esCode][0]['readiness'] ?? '' }}</td>
</tr>
    @php($dupCheckList[$esCode] = true)

    @endempty

@endforeach

@endif

@endforeach

</table>
