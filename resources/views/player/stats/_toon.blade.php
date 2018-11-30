    @if($arenaChar['squadUnitType'] == 'UNITTYPELEADER')
        @if(isset($skillKeys['leaderskill_' . strtoupper($arenaChar['defId'])]))
        <div class="stats-check-ok"><i class="fa fa-check text-success"></i> Die Einheit im Leader-Slot ist ein Anführer ({{ $skillKeys['leaderskill_' . strtoupper($arenaChar['defId'])] }}).</div>
        @else
        <div class="text-danger"><i class="fa fa-bolt text-danger"></i> Die Einheit im Leader-Slot ist kein Anführer. Oops?</div>
        @endif
    @endif

    @if($rosterToon['level'] == $info['level'])
    <div class="stats-check-ok"><i class="fa fa-check text-success"></i> Die Einheit ist maximal gelevelt ({{ $rosterToon['level'] }}/{{ $info['level'] }}).</div>
    @else
    <div class="text-danger"><i class="fa fa-times text-danger"></i> Die Einheit ist nicht auf dem maximalen Level ({{ $rosterToon['level'] }}/{{ $info['level'] }}).</div>
    @endif

    @if($rosterToon['combatType'] == 'SHIP' && $rosterToon['gear'] == 1)
    <div class="stats-check-ok"><i class="fa fa-check text-success"></i> Ausrüstung bei Schiffen ist immer gleich (1).</div>
    @elseif($rosterToon['combatType'] == 'SHIP')
    <div class="text-muted"><i class="fa fa-info text-muted"></i> Ausrüstung {{ $rosterToon['gear'] }}? Das ist eigentlich nicht möglich.</div>
    @elseif($rosterToon['gear'] + (count($rosterToon['equipped']) / 10) == 12.5)
    <div class="stats-check-ok"><i class="fa fa-check text-success"></i> Die Einheit hat sämtliche bekannte Ausrüstung (12.5 !).</div>
    @elseif($rosterToon['gear'] + (count($rosterToon['equipped']) / 10) >= 12)
    <div><i class="fa fa-info text-danger"></i> Die Einheit hat sehr gute Ausrüstung ({{ $rosterToon['gear'] + (count($rosterToon['equipped']) / 10) }}), aber nicht die Bestmögliche.</div>
    @else
    <div class="text-danger"><i class="fa fa-times text-danger"></i> Der Einheit fehlt noch Einiges an Ausrüstung ({{ $rosterToon['gear'] + (count($rosterToon['equipped']) / 10) }}).</div>
    @endif

<!-- <div class="stats-check-ignore">NOT IMPLEMENTED - was fehlt ggf?</div> -->

    @if($rosterToon['rarity'] == 7)
    <div class="stats-check-ok"><i class="fa fa-check text-success"></i> Die Einheit ist vollständig freigeschaltet ({{ $rosterToon['rarity'] }} Sterne).</div>
    @else
    <div class="text-danger"><i class="fa fa-bolt text-danger"></i> Die Einheit ist noch nicht fertig gefarmt ({{ $rosterToon['rarity'] }}/7 Sterne).</div>
    @endif

    @if($rosterToon['combatType'] == 'CHARACTER')
        @if(count($rosterToon['mods']) == 6)
        <div class="stats-check-ok"><i class="fa fa-check text-success"></i> Die Einheit ist mit 6 Mods ausgestattet.</div>
        @else
        <div class="text-danger"><i class="fa fa-bolt text-danger"></i> Der Einheit fehlen {{ 6 - count($rosterToon['mods']) }} Mods. Unbedingt vervollständigen.</div>
        @endif
    @endif

    @if($rosterToon['combatType'] == 'CHARACTER')
        @foreach($rosterToon['mods'] as $toonMod)
            @if($toonMod['pips'] == 6)
            <div class="stats-check-ok"><i class="fa fa-check text-success"></i> Slot {{$toonMod['slot']}}: Ein 6-pip-Mod. Sehr beeindruckend!</div>
            @elseif($toonMod['pips'] == 5)
            <div class="stats-check-ignore"><i class="fa fa-info text-danger"></i> Slot {{$toonMod['slot']}}: 5-pip-Mod gefunden. Slicing auf 6 wäre möglich.</div>
            @elseif($isFleetCheck ?? false)
            <div class="text-danger"><i class="fa fa-bolt text-danger"></i> Slot {{$toonMod['slot']}}: {{ $toonMod['pips'] }}-pip-Mod gefunden. Für die Flotte zählen nur Level und Pips eines Mods. Nicht seine Eigenschaften.</div>
            @else
            <div><i class="fa fa-times text-danger"></i> Slot {{$toonMod['slot']}}: {{ $toonMod['pips'] }}-pip-Mod gefunden. Wirklich arenatauglich?</div>
            @endif
            @if($toonMod['level'] == 15)
            <div class="stats-check-ok"><i class="fa fa-check text-success"></i> Slot {{$toonMod['slot']}}: Der Mod hat die maximale Stufe ({{ $toonMod['level'] }}).</div>
            @else
            <div class="text-danger"><i class="fa fa-bolt text-danger"></i> Slot {{$toonMod['slot']}}: Der Mod ist nur Stufe {{ $toonMod['level'] }}. Sofort auf Max bringen oder tauschen.</div>
            @endif
            {{-- $toonMod['tier'] enthält die Qualität/Farbe des Mods --}}
            {{-- $toonMod['set'] enthält die Set Info --}}
            {{-- $toonMod['primaryStat'][] ... --}}
            {{-- $toonMod['secondaryStat'][] ... --}}
        @endforeach
    @endif

<!-- <div class="stats-check-ignore">NOT IMPLEMENTED - unvollständige Sets</div> -->
    @foreach($rosterToon['skills'] as $toonSkill)
        @if($arenaChar['squadUnitType'] == 'UNITTYPEDEFAULT' && $toonSkill['id'] == 'leaderskill_' . strtoupper($arenaChar['defId']))
        <div class="stats-check-ignore text-muted"><i class="fa fa-info text-muted"></i> Fähigkeit <em>{{ $skillKeys[$toonSkill['id']] }}</em> ist eine Leader-Fähigkeit und daher hier irrelevant. Stufe {{$toonSkill['tier']}}.@if($toonSkill['isZeta']) <span class="icon-zeta"></span>@endif</div>
        @elseif($arenaChar['squadUnitType'] <> 'UNITTYPEREINFORCEMENT' && false !== strpos($toonSkill['id'], 'hardwareskill'))
        <div class="stats-check-ignore text-muted"><i class="fa fa-info text-muted"></i> Fähigkeit <em>{{ $skillKeys[$toonSkill['id']] }}</em> ist eine Verstärkungs-Fähigkeit und daher hier irrelevant. Stufe {{$toonSkill['tier']}}.</div>
        @elseif($toonSkill['tier'] == 8 || $toonSkill['tier'] == ($skillData[$toonSkill['id']]['max_tier'] ?? -1) )
            @if(false !== strpos($toonSkill['id'], 'contractskill'))
            <div class="stats-check-ok"><i class="fa fa-check text-success"></i> Vertrag/Payout <em>{{ $skillKeys[$toonSkill['id']] }}</em> ist auf Max ({{ $toonSkill['tier'] }}).</div>
            @elseif(false !== strpos($toonSkill['id'], 'hardwareskill'))
            <div class="stats-check-ok"><i class="fa fa-check text-success"></i> Verstärkung <em>{{ $skillKeys[$toonSkill['id']] }}</em> ist auf Max ({{ $toonSkill['tier'] }}).</div>
            @elseif($toonSkill['tier'] == 8 && $rosterToon['combatType'] == 'CHARACTER')
            <div class="stats-check-ok"><i class="fa fa-check text-success"></i> Fähigkeit <em>{{ $skillKeys[$toonSkill['id']] }}</em> ist auf Max ({{ $toonSkill['tier'] }}).@if($toonSkill['isZeta']) <span class="icon-zeta"></span>@else <span class="icon-omega"></span>@endif</div>
            @else
            <div class="stats-check-ok"><i class="fa fa-check text-success"></i> Fähigkeit <em>{{ $skillKeys[$toonSkill['id']] }}</em> ist auf Max ({{ $toonSkill['tier'] }}).</div>
            @endif
        @elseif($toonSkill['tier'] == 7 && $rosterToon['combatType'] == 'CHARACTER')
        <div><i class="fa fa-info text-danger"></i> Fähigkeit <em>{{ $skillKeys[$toonSkill['id']] }}</em> ist auf Stufe {{ $toonSkill['tier'] }}.@if($toonSkill['isZeta']) Zeta fehlt noch.<span class="icon-zeta"></span>@else Omega fehlt noch.<span class="icon-omega"></span>@endif</div>
            @if($toonSkill['isZeta'])
            @foreach($zetas ?? [] as $zeta)
                @if( ($zeta['name'] ?? '') == ($toonSkill['nameKey'] ?? '...') )
            <span class="">Zeta-Bewertung: {{ $zeta['versa'] ?? '' }} (1:gut bis 10:schlecht, siehe <a href="{{ route('zetas') }}">Zetaliste</a> für Details)</span>
                @endif
            @endforeach
            @endif
        @elseif($rosterToon['combatType'] == 'CHARACTER')
        <div class="text-danger"><i class="fa fa-bolt text-danger"></i> Fähigkeit <em>{{ $skillKeys[$toonSkill['id']] }}</em> ist auf Stufe {{ $toonSkill['tier'] }}/{{ $skillData[$toonSkill['id']]['max_tier'] ?? '?' }}. Sofort prüfen.@if($toonSkill['isZeta']) Ist zudem Zeta.<span class="icon-zeta"></span>@endif</div>
        @else
        <div class="text-danger"><i class="fa fa-times text-danger"></i> Fähigkeit <em>{{ $skillKeys[$toonSkill['id']] }}</em> ist auf Stufe {{ $toonSkill['tier'] }}/{{ $skillData[$toonSkill['id']]['max_tier'] ?? '?' }}.</div>
        @endif
    @endforeach
<!-- <div class="stats-check-ignore">NOT IMPLEMENTED - abilities check auf fehlende skills</div> -->
<!-- <div class="stats-check-ignore">NOT IMPLEMENTED - abilities check mit zetaliste</div> -->
<!-- <div class="stats-check-ignore">NOT IMPLEMENTED - synergy</div> -->
