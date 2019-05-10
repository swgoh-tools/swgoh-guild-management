@extends('layouts.app')




@section('content')

            <div class="text-center">
                <div class="alert alert-info" role="alert">
                @foreach ($teams ?? [] as $key => $team)
                @if ($loop->first) <a href="{{ route('guild.stats', $guild) }}">{{ __('Dashboard') }}</a> |
                @else
                    @if ($loop->index & 1) <i class="fa fa-empire"></i>
                    @else <i class="fa fa-resistance"></i>
                    @endif
                @endif
                @if ($key <> 'updated') <a href="{{ route('guild.stats', $guild) }}/{{ $key }}">{{ strtoupper($key) }}</a> @endif
                @endforeach
                </div>

                <h1 class="mr-auto">{{ __('Evaluation') }}</h1>
            </div>
            <!-- <p class="text-left">{{ __('app.howto.click_head') }}</p> -->
            <div>
                @foreach($teams ?? [] as $key => $team)
                {{-- Zusammenfassung --}}
                @if(!$selection)

                @includeIf('guild.stats._raids-' . $key)

                {{-- Special --}}
                @elseif($key == 'sith' && 'raid-hstr' == $selection)
                @include('guild.stats._raids-sith')

                {{-- Detailauswertung --}}
                @elseif($key == $selection)

                @include('guild.stats._details')

                @endif
                @endforeach

            </div>
@endsection

<?php

function checkTeamStatus($event, $team, $memberId, &$roster, &$unitKeys) {
    $currentTeam = [];
    $currentStats = [
        'gp' => 0,
        'gear' => 0,
        'level' => 0,
        'rarity' => 0,
        'zetas' => 0,
        'valid' => 0,
    ];
    $teamSize = min(count($team ?? []), 5);

    foreach ($team ?? [] as $teamchar) {
        $teamchar = preg_split('/:/', $teamchar);
        $teamcharname = $teamchar[0];
        $tmp = [
            'gp' => $roster[$teamcharname][$memberId]['gp'] ?? 0,
            'gear' => $roster[$teamcharname][$memberId]['gear'] ?? 0 + (count($roster[$teamcharname][$memberId]['equipped'] ?? []) / 10),
            'level' => $roster[$teamcharname][$memberId]['level'] ?? 0,
            'rarity' => $roster[$teamcharname][$memberId]['rarity'] ?? 0,
            'zetas' => [],
        ];
        $currentStats['gp'] += $tmp['gp'];
        $isValid = true;
        ($tmp['gear'] >= ($team['gear'] ?? $event['gear'] ?? 0) || ($roster[$teamcharname]['isShip'] ?? false)) ? $currentStats['gear'] += 1 : $isValid = false; // irrelevant für Schiffe
        ($tmp['level'] >= ($team['level'] ?? $event['level'] ?? 0)) ? $currentStats['level'] += 1 : $isValid = false;
        ($tmp['rarity'] >= ($team['rarity'] ?? $event['rarity'] ?? 0)) ? $currentStats['rarity'] += 1 : $isValid = false;
        $zetacount = 0;
        foreach ($teamchar as $zetaindex => $zetaskill) {
            if ($zetaindex <> 0) {
                foreach ($roster[$teamcharname][$memberId]['skills'] ?? [] as $rosterindex => $rosterskill) {
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
        // $currentTeam[$teamcharname] =  $roster[$teamcharname][$memberId]['nameKey'] ?? $teamcharname . ': ' . implode(', ', $tmp);
        $currentTeam[$teamcharname] =  $tmp;
        $currentTeam[$teamcharname]['name'] =  $unitKeys[$teamcharname]['name'] ?? $teamcharname;
    }
    return [
        'team' => $currentTeam,
        'stats' => $currentStats,
        'size' => $teamSize,
    ];
}
?>
