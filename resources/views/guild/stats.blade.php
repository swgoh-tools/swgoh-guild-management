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

                <h1 class="mr-auto">Auswertung</h1>
            </div>
            <!-- <p class="text-left">{{ __('app.howto.click_head') }}</p> -->
            <div>
                @foreach($teams ?? [] as $key => $team)
                {{-- Zusammenfassung --}}
                @if(!$selection)
                @switch($key)
                    @case('rancor')
<?php
    $eventStats = [];
?>
                    @foreach($members ?? [] as $key => $member)
                    @foreach($team['phase'][2]['squads'] ?? [] as $squad)
<?php
    $tmpTeam = checkTeamStatus($team, $squad['team'], $member['allyCode'], $roster, $unitKeys);
    $eventStats[max($tmpTeam['size'] - $tmpTeam['stats']['valid'], 0)][$member['allyCode']] = $member['name'];
?>
                    @endforeach
                    @endforeach
<?php
    prepareEventStats($eventStats);
?>
<div class="card mb-2">
<img class="card-img-top" src="{{ asset('images/assets/tex.guild_raids_rancor.jpg') }}" alt="Heroic Rancor">
<h5 class="card-header">Heroic Rancor (einfach, auto-solo)</h5>
<div class="card-body">
<p>Der älteste Raid im Spiel. Hat <strong>7</strong> Schwierigkeitsstufen. Wird von uns nur auf der höchsten Stufe (heroisch) gespielt. Gängige Abkürzungen: <strong>HPIT</strong> oder <strong>HRancor</strong>.</p>
<p>Der Richtwert für die Stärke benötigter Charaktere liegt beim HPIT bei <strong>{{ $team['rarity'] ?? '-' }} Sternen</strong>, <strong>Stufe/Level {{ $team['level'] ?? '-' }}</strong> und <strong>Ausrüstung der Stufe {{ $team['gear'] ?? '-' }}</strong>.</p>
<p>Laut den vorliegenden Daten haben definitiv <span class="badge badge-pill badge-primary">{{ count($eventStats[0] ?? []) }}</span>*) Gildenmitglieder ein Team, um den HPIT <strong>auto-solo</strong> zu spielen. Das heißt mit einem <em>einzigen</em> Team im <em>Auto-Play-Modus</em> alle 4 Phasen besiegen und die maximale Punkteausbeute von <strong>10.304.366</strong> Schaden mitzunehmen***).
Weitere <span class="badge badge-pill badge-primary">{{ count($eventStats[1] ?? []) }}</span>**) Gildenmitglieder sind vermutlich bereits oder demnächst solo-fähig. Da der Raid so alt ist, gibt es unzählige unterschiedliche Teams, mit denen sich der HPIT solo besiegen lässt.</p>
<p><em>* {{ implode(', ', $eventStats[0] ?? []) }}</em>
<br /><em>** {{ implode(', ', $eventStats[1] ?? []) }}</em>
<br /><em>*** Bei gleicher Punktausbeute entscheidet das Spiel per Zufallsgenerator, wer auf welcher Platzierung landet und die dazugehörige Beute/Belohnung erhält.</em></p>
</div>
<div class="card-footer">
<div class="progress">
  <!-- <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div> -->
  <div class="progress-bar bg-success" role="progressbar" style="width: {{ round(count($eventStats[0] ?? []) / count($members ?? []) * 100, 1) }}%" aria-valuenow="{{ round(count($eventStats[0] ?? []) / count($members ?? []) * 100, 1) }}" aria-valuemin="0" aria-valuemax="100">{{ round(count($eventStats[0] ?? []) / count($members ?? []) * 100, 1) }} %</div>
  <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: {{ round(count($eventStats[1] ?? []) / count($members ?? []) * 100, 1) }}%" aria-valuenow="{{ round(count($eventStats[1] ?? []) / count($members ?? []) * 100, 1) }}" aria-valuemin="0" aria-valuemax="100">{{ round(count($eventStats[1] ?? []) / count($members ?? []) * 100, 1) }} %</div>
</div>
</div>
</div>
                    @break

                    @case('haat')
<?php
    $eventStats = [];
?>
                    @foreach($members ?? [] as $key => $member)
                    @foreach($team['phase'][4]['squads'] ?? [] as $squad)
<?php
    $tmpTeam = checkTeamStatus($team, $squad['team'], $member['allyCode'], $roster, $unitKeys);
    $eventStats[max($tmpTeam['size'] - $tmpTeam['stats']['valid'], 0)][$member['allyCode']] = $member['name'];
?>
                    @endforeach
                    @endforeach
<?php
    prepareEventStats($eventStats);
?>
<div class="card mb-2">
<img class="card-img-top" src="{{ asset('images/assets/tex.guild_raids_aat.jpg') }}" alt="Heroic Rancor">
<h5 class="card-header">Heroic Tank (herausfordernd, solo)</h5>
<div class="card-body">
<p>Der zweite Raid des Spiels. Hat <strong>2</strong> Schwierigkeitsstufen. Wird von uns nur auf der höchsten Stufe (heroisch) gespielt. Gängige Abkürzungen: <strong>HAAT</strong> oder <strong>HTank</strong>.</p>
<p>Der Richtwert für die Stärke benötigter Charaktere liegt beim HAAT bei <strong>{{ $team['rarity'] ?? '-' }} Sternen</strong>, <strong>Stufe/Level {{ $team['level'] ?? '-' }}</strong> und <strong>Ausrüstung der Stufe {{ $team['gear'] ?? '-' }}</strong>.</p>
<p>Laut den vorliegenden Daten haben <span class="badge badge-pill badge-primary">{{ count($eventStats[0] ?? []) }}</span>*) Gildenmitglieder ein Team, mit dem es möglich sein könnte, den HAAT solo zu spielen. Das heißt mit einem <em>einzigen</em> Team alle 4 Phasen besiegen und die maximale Punkteausbeute von <strong>48.346.357</strong> Schaden mitzunehmen***).
Weitere <span class="badge badge-pill badge-primary">{{ count($eventStats[1] ?? []) }}</span>**) Gildenmitglieder haben mindestens ein bekanntes Solo-Team im fortgeschrittenen Zustand. Ein auto-solo ist mit aktuellen Teams im HAAT nicht möglich. Sololäufe erfordern gute Kenntnis von Team und Gegner sowie gutes (manuelles) Timing.</p>
<p><em>* {{ implode(', ', $eventStats[0] ?? []) }}</em>
<br /><em>** {{ implode(', ', $eventStats[1] ?? []) }}</em>
<br /><em>*** Bei gleicher Punktausbeute entscheidet das Spiel per Zufallsgenerator, wer auf welcher Platzierung landet und die dazugehörige Beute/Belohnung erhält.</em></p>
</div>
<div class="card-footer">
<div class="progress">
  <!-- <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div> -->
  <div class="progress-bar bg-success" role="progressbar" style="width: {{ round(count($eventStats[0] ?? []) / count($members ?? []) * 100, 1) }}%" aria-valuenow="{{ round(count($eventStats[0] ?? []) / count($members ?? []) * 100, 1) }}" aria-valuemin="0" aria-valuemax="100">{{ round(count($eventStats[0] ?? []) / count($members ?? []) * 100, 1) }} %</div>
  <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: {{ round(count($eventStats[1] ?? []) / count($members ?? []) * 100, 1) }}%" aria-valuenow="{{ round(count($eventStats[1] ?? []) / count($members ?? []) * 100, 1) }}" aria-valuemin="0" aria-valuemax="100">{{ round(count($eventStats[1] ?? []) / count($members ?? []) * 100, 1) }} %</div>
</div>
</div>
</div>

                    @break

                    @case('sith')
<?php
    $eventStats = [];
    $sithSquads = [];
    $sithDamage = [];
    ?>
                    @foreach($members ?? [] as $key => $member)
                    @foreach($team['phase'] ?? [] as $phasekey => $phase)
                    @foreach($phase['squads'] ?? [] as $squad)
<?php
    $tmpTeam = checkTeamStatus($team, $squad['team'], $member['allyCode'], $roster, $unitKeys);
    $eventStats[$phasekey][max($tmpTeam['size'] - $tmpTeam['stats']['valid'], 0)][$member['allyCode']] = $member['name'];
    $squadWithDamage = $squad;
    preg_match('/(\d*\.?\d+)%-(\d+)%/', $squad['note'] ?? '', $matches);
    $squadWithDamage['DMG'] = (($matches[1] ?? 0) + ($matches[2] ?? 0)) / 2;
    $squadWithDamage['DMG_MIN'] = $matches[1] ?? 0;
    $squadWithDamage['DMG_MAX'] = $matches[2] ?? 0;
    $sithSquads[$phasekey][max($tmpTeam['size'] - $tmpTeam['stats']['valid'], 0)][$member['allyCode']][] = $squadWithDamage;
?>
                    @endforeach
                    @endforeach
                    @endforeach
<?php
foreach ($eventStats as $eventStatsKey => $eventStatsValue) {
    prepareEventStats($eventStats[$eventStatsKey]);
    foreach ($sithSquads[$eventStatsKey] ?? [] as $validationKey => $validationMember) {
        $sithDamage[$eventStatsKey][$validationKey]['DMG'] = 0;
        $sithDamage[$eventStatsKey][$validationKey]['DMG_MIN'] = 0;
        $sithDamage[$eventStatsKey][$validationKey]['DMG_MAX'] = 0;
       foreach ($validationMember as $validationMemberSquads) {
        $sithDamage[$eventStatsKey][$validationKey]['DMG'] += $validationMemberSquads[0]['DMG'];
        $sithDamage[$eventStatsKey][$validationKey]['DMG_MIN'] += $validationMemberSquads[0]['DMG_MIN'];
        $sithDamage[$eventStatsKey][$validationKey]['DMG_MAX'] += $validationMemberSquads[0]['DMG_MAX'];
    }
    }
}
?>
<div class="card mb-2">
<img class="card-img-top" src="{{ asset('images/assets/tex.guild_raids_triumvirate.jpg') }}" alt="Heroic Sith">
<h5 class="card-header">Heroic Sith (abenteuerlich)</h5>
<div class="card-body">
<p>Der dritte und neueste Raid des Spiels. Hat <strong>7</strong> Schwierigkeitsstufen. Wird von uns aktuell auf Stufe 5 und 6 - also noch nicht heroisch - gespielt. Gängige Abkürzung: <strong>HSTR</strong>.</p>
<p>Der Richtwert für die Stärke benötigter Charaktere liegt beim HSTR bei <strong>{{ $team['rarity'] ?? '-' }} Sternen</strong>, <strong>Stufe/Level {{ $team['level'] ?? '-' }}</strong> und <strong>Ausrüstung der Stufe {{ $team['gear'] ?? '-' }}</strong>.</p>
<p>Ein Solo des Raids ist nicht möglich. Selbst das Solo einer einzelnen Phase ist nicht möglich. Es ist die Zusammenarbeit der gesamten Gilde notwendig. Ziel sollte es sein, dass jeder Spieler pro Phase jeweils 4-6% Schaden macht. <em>Jeder</em> hat im Idealfall also mindestens <strong>4 verschiedene Teams</strong> mit unterschiedlichen Charakteren parat.</p>
@foreach($eventStats as $eventStatsKey => $eventStatsValue)
<p>{{ $team['phase'][$eventStatsKey]['name'] ?? '' }}:
<br />Laut den vorliegenden Daten steuern <span class="badge badge-pill badge-primary">{{ count($eventStatsValue[0] ?? []) }}</span> Gildenmitglieder<small style="vertical-align:top;">{{ $loop->iteration }}a)</small> insgesamt ca. {{ $sithDamage[$eventStatsKey][0]['DMG'] ?? 0 }}% Schaden ({{ $sithDamage[$eventStatsKey][0]['DMG_MIN'] ?? 0 }}%-{{ $sithDamage[$eventStatsKey][0]['DMG_MAX'] ?? 0 }}%) bei.
Weitere <span class="badge badge-pill badge-primary">{{ count($eventStatsValue[1] ?? []) }}</span> Gildenmitglieder<small style="vertical-align:top;">{{ $loop->iteration }}b)</small> haben mindestens ein passendes Team im fortgeschrittenen Zustand für ca. {{ $sithDamage[$eventStatsKey][1]['DMG'] ?? 0 }}% Schaden ({{ $sithDamage[$eventStatsKey][1]['DMG_MIN'] ?? 0 }}%-{{ $sithDamage[$eventStatsKey][1]['DMG_MAX'] ?? 0 }}%).
<div class="progress">
    @foreach($eventStatsValue[0] ?? [] as $eventStatsValueKey => $eventStatsValueValue)
    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $sithSquads[$eventStatsKey][0][$eventStatsValueKey][0]['DMG'] ?? 0 }}%" aria-valuenow="{{ $sithSquads[$eventStatsKey][0][$eventStatsValueKey][0]['DMG'] ?? 0 }}" aria-valuemin="0" aria-valuemax="100">{{ $sithSquads[$eventStatsKey][0][$eventStatsValueKey][0]['DMG'] ?? 0 }} %</div>
    @endforeach
    @foreach($eventStatsValue[1] ?? [] as $eventStatsValueKey => $eventStatsValueValue)
    <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: {{ $sithSquads[$eventStatsKey][1][$eventStatsValueKey][0]['DMG'] ?? 0 }}%" aria-valuenow="{{ $sithSquads[$eventStatsKey][1][$eventStatsValueKey][0]['DMG'] ?? 0 }}" aria-valuemin="0" aria-valuemax="100">{{ $sithSquads[$eventStatsKey][1][$eventStatsValueKey][0]['DMG'] ?? 0 }} %</div>
    @endforeach
</div>
</p>
@endforeach
@foreach($eventStats as $eventStatsKey => $eventStatsValue)
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
Während oben der prozentuale Schadensanteil an der jeweiligen Phase abgetragen ist wird im Folgenden dargestellt, wie viele Spieler aus der Gilde jeweils 'einsatzbereit' sind.
    @foreach($eventStats as $eventStatsKey => $eventStatsValue)
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
                {{-- Detailauswertung --}}
                @elseif($key == $selection)
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
    $tmpTeam = checkTeamStatus($team, $squad['team'], $member['allyCode'], $roster, $unitKeys);
?>
<div class="mytooltip mytooltip-fixed @if($tmpTeam['stats']['valid'] >= $tmpTeam['size'])bg-success text-white @elseif($tmpTeam['stats']['valid'] == $tmpTeam['size'] - 1)bg-warning @else text-muted @endif">{{  $tmpTeam['stats']['gp'] }}<span class="mytooltiptext">
{{ $member['name'] }}<br />
{{ $squad['name'] }}<br />- - - - -<br />
@if($tmpTeam['stats']['level'] < $tmpTeam['size']){{$tmpTeam['stats']['level']}}/{{ $tmpTeam['size'] }} Chars sind ausreichend gelevelt.<br />@endif
@if($tmpTeam['stats']['gear'] < $tmpTeam['size']){{$tmpTeam['stats']['gear']}}/{{ $tmpTeam['size'] }} Chars sind ausreichend ausgerüstet.<br />@endif
@if($tmpTeam['stats']['rarity'] < $tmpTeam['size']){{$tmpTeam['stats']['rarity']}}/{{ $tmpTeam['size'] }} Chars haben genügend Sterne.<br />@endif
@if($tmpTeam['stats']['zetas'] < $tmpTeam['size']){{$tmpTeam['stats']['zetas']}}/{{ $tmpTeam['size'] }} Chars haben genügend Zetas.<br />@endif
<table>
<tr><td>{{ __('Toons') }}</td><td>{{ __('Power') }}</td><td>{{ __('Gear') }}</td><td>{{ __('Level') }}</td><td>{{ __('Stars') }}</td></tr>
@foreach($tmpTeam['team'] as $currentTeamChar)
<tr><td>{{$currentTeamChar['name']}}</td><td>{{$currentTeamChar['gp']}}</td><td>{{$currentTeamChar['gear']}}</td><td>{{$currentTeamChar['level']}}</td><td>{{$currentTeamChar['rarity']}}</td></tr>
@foreach($currentTeamChar['zetas'] as $currentTeamCharZetaKey => $currentTeamCharZeta)
<tr><td> - {{ $skillKeys[$currentTeamCharZetaKey] ?? $currentTeamCharZetaKey }}</td><td>{{$currentTeamCharZeta}}</td><td>-</td><td>-</td><td>-</td></tr>
@endforeach
@endforeach
</table></span></div>

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

<?php

function prepareEventStats(&$eventStats) {
    if (isset($eventStats[0])) {
        asort($eventStats[0]);
    };
    if (isset($eventStats[1])) {
        foreach ($eventStats[0] ?? [] as $key => $value) {
            if (isset($eventStats[1][$key])) {
                unset($eventStats[1][$key]);
            }
        }
        asort($eventStats[1]);
    };
}

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
