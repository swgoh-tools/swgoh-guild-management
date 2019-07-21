<table class="table table-sm table-hover table-striped w-auto"><tr>
    <th>{{ __('Name') }}</th>
    <th>{{ __('Damage') }}</th>
    <th>{{ __('Percent') }}</th>
    <th>{{ __('Team') }}</th>
    <th>{{ __('Note') }}</th>
    <th>{{ __('Readiness') }}</th>
    <th>{{ __('Damage') }} ({{ __('cum.') }})</th>
    <th>{{ __('Percent') }} ({{ __('cum.') }})</th>
    <th> </th>
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
    @php($tmpTeam = checkTeamStatus($team, $sithSquads[$esPhaseKey][$esReadyKey][$esCode][0]['team'], $esCode, $roster, $unitKeys))
<tr class='{{ $curTableClass }}'>
    <td><a href="{{ route('guild.stats', $page_guild) }}/raid-hstr/{{ $esCode }}">{{ $esName }}</a></td>
    <td>{{ round( $curDMG / 1000000 , 1) }}M</td>
    <td>{{ $curDMG_100 }}%</td>
    <td>{{ $sithSquads[$esPhaseKey][$esReadyKey][$esCode][0]['name'] ?? '' }}</td>
    <td>{{ preg_split('/\s/', $sithSquads[$esPhaseKey][$esReadyKey][$esCode][0]['note'] ?? '')[0] }}</td>
    <td>{{ $sithSquads[$esPhaseKey][$esReadyKey][$esCode][0]['readiness'] ?? '' }}</td>
    <td>{{ round( $sumProgressTotal / 1000000 , 1) }}M</td>
    <td>{{ $sumProgress }}%</td>
    <td>
<span class="@if($tmpTeam['stats']['valid'] >= $tmpTeam['size'])bg-success text-white @elseif($tmpTeam['stats']['valid'] == $tmpTeam['size'] - 1)bg-warning @else text-muted @endif">{{  $tmpTeam['stats']['gp'] }}</span>
<span class="mytooltip mytooltip-xxfixed mytooltip-no-wrap"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="mytooltiptext">
{{ $sithSquads[$esPhaseKey][$esReadyKey][$esCode][0]['name'] }}<br />- - - - -<br />
@include('guild.stats._details-tooltiptext')</span></span>
    </td>
</tr>
    @php($dupCheckList[$esCode] = true)

    @endempty

@endforeach

@endif

@endforeach

</table>
