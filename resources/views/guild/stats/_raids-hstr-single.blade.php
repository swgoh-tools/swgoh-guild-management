@push('scripts')
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endpush


<table class="table table-sm table-hover table-striped w-auto"><tr>
<th>{{ __('Name') }}</th>
    <th>{{ __('Damage') }}</th>
    <th>{{ __('Share') }}</th>
    <th>{{ __('Team') }}</th>
    <th>{{ __('Note') }}</th>
    <th>{{ __('Readiness') }}</th>
    <th>{{ __('Damage') }} ({{ __('cum.') }})</th>
    <th>{{ __('Percent') }} ({{ __('cum.') }})</th>
    <th> </th>
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

@php($tmpTeam = checkTeamStatus($team, $esTeam['team'], $esCode, $roster, $unitKeys))
<tr class='{{ $curTableClass }}'>
    <td>{{ $esPhaseValue[$esReadyKey][$esCode] }}</td>
    <td>{{ round( $curDMG / 1000000 , 1) }}M</td>
    <td>{{ $curDMG_100 }}%</td>
    <td>{{ $esTeam['name'] ?? '' }}</td>
    <td>{{ preg_split('/\s/', $esTeam['note'] ?? '')[0] }}</td>
    <td>{{ $esTeam['readiness'] ?? '' }}</td>
    <td>{{ round( $sumProgressTotal / 1000000 , 1) }}M</td>
    <td>{{ $sumProgress }}%</td>
    <td>
<span class="@if($tmpTeam['stats']['valid'] >= $tmpTeam['size'])bg-success text-white @elseif($tmpTeam['stats']['valid'] == $tmpTeam['size'] - 1)bg-warning @else text-muted @endif">{{  $tmpTeam['stats']['gp'] }}</span>
<span class="mytooltip mytooltip-xxfixed mytooltip-no-wrap"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="mytooltiptext">
{{ $esTeam['name'] }}<br />- - - - -<br />
@include('guild.stats._details-tooltiptext')</span></span>
    </td>
</tr>

@endif

@endforeach
@endforeach

@endif

@endforeach

</table>
