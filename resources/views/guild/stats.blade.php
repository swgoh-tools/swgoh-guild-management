@extends('layouts.app')




@section('content')

            <div class="text-center">
                <div class="alert alert-info" role="alert">
                @foreach ($teams ?? [] as $key => $team)
                @if ($loop->first) Nav:
                @else
                    @if ($loop->index & 1) <i class="fa fa-empire"></i>
                    @else <i class="fa fa-resistance"></i>
                    @endif
                @endif
                @if ($key <> 'updated') <a href="{{ route('guild.stats', $guild) }}/{{ $key }}">{{ strtoupper($key) }}</a> @endif
                @endforeach
                </div>

                <h1 class="mr-auto">Auswertung</h1>
            </div>
            <!-- <p class="text-left">{{ __('app.howto.click_head') }}</p> -->
            <div>
                @foreach($teams ?? [] as $key => $team)
                @if($key == $selection)
                <h2>{{ $team['name'] ?? $key ?? 'PLACEHOLDER' }}</h2>
            <table class="table table-striped table-responsive table-sm">
                <tr>
                    <!-- <th class="rotate"><div><span>{{ __('Event') }}</span></div></th> -->
                    <th class="rotate"><div><span>{{ __('phase') }}</span></div></th>
                    <th class="rotate"><div><span>{{ __('rarity') }}</span></div></th>
                    <th class="rotate"><div><span>{{ __('gear') }}</span></div></th>
                    <th class="rotate"><div><span>{{ __('level') }}</span></div></th>
                    <th class="rotate"><div><span>{{ __('Team') }}</span></div></th>
                @foreach($members ?? [] as $key => $member)
                    <th class="rotate"><div><span><a href="{{ route('player.home', $member['allyCode']) }}">{{ $member['name'] ?? 'PLACEHOLDER' }}</a></span></div></th>
                @endforeach
                </tr>
                @foreach($team['phase'] ?? [] as $phase)
                        @foreach($phase['squads'] ?? [] as $squad)
                <tr @if($loop->first) style="padding-top:5px;" @endif>
                    <!-- <td>{{ $team['name'] ?? $key ?? 'PLACEHOLDER' }}</td> -->
                    @if($loop->first)
                    <td style="white-space: nowrap;">{{ ucwords(strtolower($phase['name'] ?? '-')) }}</td>
                    <td>{{ $team['rarity'] ?? '-' }}</td>
                    <td>{{ $team['gear'] ?? '-' }}</td>
                    <td>{{ $team['level'] ?? '-' }}</td>
                    @else
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    @endif
                    <td style="white-space: nowrap;">{{ ucwords(strtolower($squad['name'] ?? '-')) }}</td>
                    @foreach($members ?? [] as $key => $member)
                        <td>
<?php
$currentTeam = [];
$currentStats = [
    'gp' => 0,
    'gear' => 0,
    'level' => 0,
    'rarity' => 0,
    'zetas' => 0,
    'valid' => 0,
];
$teamSize = min(count($squad['team'] ?? []), 5);
?>
                            @foreach($squad['team'] ?? [] as $teamchar)
<?php
$teamchar = preg_split('/:/', $teamchar);
$teamcharname = $teamchar[0];
$tmp = [
    'gp' => $roster[$teamcharname][$member['allyCode']]['gp'] ?? 0,
    'gear' => $roster[$teamcharname][$member['allyCode']]['gear'] ?? 0 + (count($roster[$teamcharname][$member['allyCode']]['equipped'] ?? []) / 10),
    'level' => $roster[$teamcharname][$member['allyCode']]['level'] ?? 0,
    'rarity' => $roster[$teamcharname][$member['allyCode']]['rarity'] ?? 0,
    'zetas' => [],
];
$currentStats['gp'] += $tmp['gp'];
$isValid = true;
(($tmp['gear'] >= $team['gear'] ?? 0) || ($roster[$teamcharname]['isShip'] ?? false)) ? $currentStats['gear'] += 1 : $isValid = false; // irrelevant für Schiffe
($tmp['level'] >= $team['level'] ?? 0) ? $currentStats['level'] += 1 : $isValid = false;
($tmp['rarity'] >= $team['rarity'] ?? 0) ? $currentStats['rarity'] += 1 : $isValid = false;
$zetacount = 0;
foreach ($teamchar as $zetaindex => $zetaskill) {
    if ($zetaindex <> 0) {
        foreach ($roster[$teamcharname][$member['allyCode']]['skills'] ?? [] as $rosterindex => $rosterskill) {
            if ($zetaskill == $rosterskill['id'] ?? 'dummy') {
                $tmp['zetas'][$zetaskill] = $rosterskill['tier'] ?? 0;
                if (8 == $rosterskill['tier'] ?? 0) {
                    $zetacount++;
                }
                break;
            }
        }
    }
}
($zetacount >= count($teamchar) - 1) ? $currentStats['zetas'] += 1 : $isValid = false;
($isValid) ? $currentStats['valid'] += 1 : null;
// $currentTeam[$teamcharname] =  $roster[$teamcharname][$member['allyCode']]['nameKey'] ?? $teamcharname . ': ' . implode(', ', $tmp);
$currentTeam[$teamcharname] =  $tmp;
$currentTeam[$teamcharname]['name'] =  $unitKeys[$teamcharname]['name'] ?? $teamcharname;
?>
@if($loop->last)
<div class="mytooltip @if($currentStats['valid'] >= $teamSize)bg-success text-white @elseif($currentStats['valid'] == $teamSize - 1)bg-warning @else text-muted @endif">{{  $currentStats['gp'] }}<span class="mytooltiptext">
{{ $squad['name'] }}<br />
@if($currentStats['level'] < $teamSize){{$currentStats['level']}}/{{ $teamSize }} Chars sind ausreichend gelevelt.<br />@endif
@if($currentStats['gear'] < $teamSize){{$currentStats['gear']}}/{{ $teamSize }} Chars sind ausreichend ausgerüstet.<br />@endif
@if($currentStats['rarity'] < $teamSize){{$currentStats['rarity']}}/{{ $teamSize }} Chars haben genügend Sterne.<br />@endif
@if($currentStats['zetas'] < $teamSize){{$currentStats['zetas']}}/{{ $teamSize }} Chars haben genügend Zetas.<br />@endif
<table>
<tr><td>{{ __('Toons') }}</td><td>{{ __('Power') }}</td><td>{{ __('Gear') }}</td><td>{{ __('Level') }}</td><td>{{ __('Stars') }}</td></tr>
@foreach($currentTeam as $currentTeamChar)
<tr><td>{{$currentTeamChar['name']}}</td><td>{{$currentTeamChar['gp']}}</td><td>{{$currentTeamChar['gear']}}</td><td>{{$currentTeamChar['level']}}</td><td>{{$currentTeamChar['rarity']}}</td></tr>
@foreach($currentTeamChar['zetas'] as $currentTeamCharZetaKey => $currentTeamCharZeta)
<tr><td> - {{ $skillKeys[$currentTeamCharZetaKey] ?? $currentTeamCharZetaKey }}</td><td>{{$currentTeamCharZeta}}</td><td>-</td><td>-</td><td>-</td></tr>
@endforeach
@endforeach
</table></span></div>
@endif
                            @endforeach
                        </td>
                    @endforeach
                </tr>
                        @endforeach
                @endforeach
            </table>
            @endif
                @endforeach

            </div>
@endsection
