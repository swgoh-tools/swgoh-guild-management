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
@foreach($sithSquadsPhasePlayer[$esPhaseKey] ?? [] as $esCode => $esPlayer)

@if($esCode == $detail)

@php(ksort($esPlayer))

@foreach($esPlayer ?? [] as $esReadyKey => $esTeams)
@foreach($esTeams ?? [] as $esTeamKey => $esTeam)

@if($esTeam['readiness'] < 5 || true)

@php($curDMG_100 = $esTeam['DMG_100'] ?? 0)
@php($curDMG = $esTeam['DMG'] ?? 0)
    @php($sumProgress += $curDMG_100)
    @php($sumProgressTotal += $curDMG)
    @switch( $esTeam['readiness'] ?? -1)
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
    <td>{{ $esPhaseValue[$esReadyKey][$esCode] }}</td>
    <td>{{ round( $curDMG / 1000000 , 1) }}M</td>
    <td>{{ $curDMG_100 }}%</td>
    <td>{{ $esTeam['name'] ?? '' }}</td>
    <td>{{ preg_split('/\s/', $esTeam['note'] ?? '')[0] }}</td>
    <td>{{ round( $sumProgressTotal / 1000000 , 1) }}M</td>
    <td>{{ $sumProgress }}%</td>
    <td>{{ $esTeam['readiness'] ?? '' }}</td>
</tr>

@endif

@endforeach
@endforeach

@endif

@endforeach

</table>
