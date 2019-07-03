    @if($arenaChar['squadUnitType'] == 'UNITTYPELEADER')
        @if(isset($skillKeys['leaderskill_' . strtoupper($arenaChar['defId'])]))
        <div class="stats-check-ok"><i class="fa fa-check text-success"></i> {{ __('app.check.unit_is_leader', [
            'skill' => $skillKeys['leaderskill_' . strtoupper($arenaChar['defId'])]
        ]) }}</div>
        @else
        <div class="text-danger"><i class="fa fa-bolt text-danger"></i> {{ __('app.check.unit_is_leader_fail') }}</div>
        @endif
    @endif

    @if($rosterToon['level'] == $info['level'])
    <div class="stats-check-ok"><i class="fa fa-check text-success"></i> {{ __('app.check.level_is_max', [
        'level' => $rosterToon['level'],
        'max' => $info['level']
    ]) }}</div>
    @else
    <div class="text-danger"><i class="fa fa-times text-danger"></i> {{ __('app.check.level_is_max_fail', [
        'level' => $rosterToon['level'],
        'max' => $info['level']
    ]) }}</div>
    @endif

    @if($rosterToon['combatType'] == 'SHIP' && $rosterToon['gear'] == 1)
    <div class="stats-check-ok"><i class="fa fa-check text-success"></i> {{ __('app.check.gear_is_max_ship_one') }}</div>
    @elseif($rosterToon['combatType'] == 'SHIP')
    <div class="text-muted"><i class="fa fa-info text-muted"></i> {{ __('app.check.gear_is_max_ship', ['gear' => $rosterToon['gear']]) }}</div>
    @elseif($rosterToon['gear'] + (count($rosterToon['equipped']) / 10) >= 13)
    <div class="stats-check-ok"><i class="fa fa-check text-success"></i> {{ __('app.check.gear_is_max', ['gear' => 13, 'max' => 13]) }}</div>
    @elseif($rosterToon['gear'] + (count($rosterToon['equipped']) / 10) >= 12)
    <div><i class="fa fa-info text-danger"></i> {{ __('app.check.gear_is_max_near', ['gear' => $rosterToon['gear'] + (count($rosterToon['equipped']) / 10), 'max' => 13]) }}</div>
    @else
    <div class="text-danger"><i class="fa fa-times text-danger"></i> {{ __('app.check.gear_is_max_fail', ['gear' => $rosterToon['gear'] + (count($rosterToon['equipped']) / 10)]) }}</div>
    @endif
    {{--
<!-- <div class="stats-check-ignore">NOT IMPLEMENTED - was fehlt ggf?</div> -->
    --}}

    @if($rosterToon['rarity'] == 7)
    <div class="stats-check-ok"><i class="fa fa-check text-success"></i> {{ __('app.check.rarity_is_max', ['rarity' => $rosterToon['rarity']]) }}</div>
    @else
    <div class="text-danger"><i class="fa fa-bolt text-danger"></i> {{ __('app.check.rarity_is_max_fail', ['rarity' => $rosterToon['rarity'], 'max' => 7]) }}</div>
    @endif

    @if($rosterToon['combatType'] == 'CHARACTER')
        @if(count($rosterToon['mods']) == 6)
        <div class="stats-check-ok"><i class="fa fa-check text-success"></i> {{ __('app.check.mod_count_is_max', ['max' => 6]) }}</div>
        @else
        <div class="text-danger"><i class="fa fa-bolt text-danger"></i> {{ __('app.check.mod_count_is_max_fail', ['missing' => 6 - count($rosterToon['mods'])]) }}</div>
        @endif
    @endif

    @if($rosterToon['combatType'] == 'CHARACTER')
        @foreach($rosterToon['mods'] as $toonMod)
            @if($toonMod['pips'] == 6)
            <div class="stats-check-ok"><i class="fa fa-check text-success"></i> {{ __('Slot') }} {{$toonMod['slot']}}: {{ __('app.check.mod_pips_is_max', ['pips' => $toonMod['pips']]) }}</div>
            @elseif($toonMod['pips'] == 5)
            <div class="stats-check-ignore"><i class="fa fa-info text-danger"></i>  {{ __('Slot') }} {{$toonMod['slot']}}: {{ __('app.check.mod_pips_is_max_near', ['pips' => $toonMod['pips'], 'max' => 6]) }}</div>
            @elseif($isFleetCheck ?? false)
            <div class="text-danger"><i class="fa fa-bolt text-danger"></i>  {{ __('Slot') }} {{$toonMod['slot']}}: {{ __('app.check.mod_pips_is_max_ship_fail', ['pips' => $toonMod['pips']]) }}</div>
            @else
            <div><i class="fa fa-times text-danger"></i>  {{ __('Slot') }} {{$toonMod['slot']}}: {{ __('app.check.mod_pips_is_max_fail', ['pips' => $toonMod['pips']]) }}</div>
            @endif
            @if($toonMod['level'] == 15)
            <div class="stats-check-ok"><i class="fa fa-check text-success"></i>  {{ __('Slot') }} {{$toonMod['slot']}}: {{ __('app.check.mod_level_is_max', ['max' => $toonMod['level']]) }}</div>
            @else
            <div class="text-danger"><i class="fa fa-bolt text-danger"></i>  {{ __('Slot') }} {{$toonMod['slot']}}: {{ __('app.check.mod_level_is_max_fail', ['level' => $toonMod['level'], 'max' => 15]) }}</div>
            @endif
        @endforeach
    @endif
    {{--
             $toonMod['tier'] enthält die Qualität/Farbe des Mods
             $toonMod['set'] enthält die Set Info
             $toonMod['primaryStat'][] ...
             $toonMod['secondaryStat'][] ...
    <!-- <div class="stats-check-ignore">NOT IMPLEMENTED - unvollständige Sets</div> -->
    --}}
    @foreach($rosterToon['skills'] as $toonSkill)
        @if($arenaChar['squadUnitType'] == 'UNITTYPEDEFAULT' && $toonSkill['id'] == 'leaderskill_' . strtoupper($arenaChar['defId']))
        <div class="stats-check-ignore text-muted"><i class="fa fa-info text-muted"></i>
            {!! __('app.check.skill_is_max_leader_ignore', ['name' => $skillKeys[$toonSkill['id']], 'skill' => $toonSkill['tier']]) !!}@if($toonSkill['isZeta']) <span class="icon-zeta"></span>@endif</div>
        @elseif($arenaChar['squadUnitType'] <> 'UNITTYPEREINFORCEMENT' && false !== strpos($toonSkill['id'], 'hardwareskill'))
        <div class="stats-check-ignore text-muted"><i class="fa fa-info text-muted"></i>
            {!! __('app.check.skill_is_max_hardware_ignore', ['name' => $skillKeys[$toonSkill['id']], 'skill' => $toonSkill['tier']]) !!}</div>
        @elseif($toonSkill['tier'] == 8 || $toonSkill['tier'] == ($skillData[$toonSkill['id']]['max_tier'] ?? -1) )
            @if(false !== strpos($toonSkill['id'], 'contractskill'))
            <div class="stats-check-ok"><i class="fa fa-check text-success"></i> {!! __('app.check.skill_is_max_contract', ['name' => $skillKeys[$toonSkill['id']], 'skill' => $toonSkill['tier']]) !!}</div>
            @elseif(false !== strpos($toonSkill['id'], 'hardwareskill'))
            <div class="stats-check-ok"><i class="fa fa-check text-success"></i> {!! __('app.check.skill_is_max_hardware', ['name' => $skillKeys[$toonSkill['id']], 'skill' => $toonSkill['tier']]) !!}</div>
            @elseif($toonSkill['tier'] == 8 && $rosterToon['combatType'] == 'CHARACTER')
            <div class="stats-check-ok"><i class="fa fa-check text-success"></i> {!! __('app.check.skill_is_max', ['name' => $skillKeys[$toonSkill['id']], 'skill' => $toonSkill['tier']]) !!}@if($toonSkill['isZeta']) <span class="icon-zeta"></span>@else <span class="icon-omega"></span>@endif</div>
            @else
            <div class="stats-check-ok"><i class="fa fa-check text-success"></i> {!! __('app.check.skill_is_max', ['name' => $skillKeys[$toonSkill['id']], 'skill' => $toonSkill['tier']]) !!}</div>
            @endif
        @elseif($toonSkill['tier'] == 7 && $rosterToon['combatType'] == 'CHARACTER')
        <div><i class="fa fa-info text-danger"></i> {!! __('app.check.skill_is_max_fail', ['name' => $skillKeys[$toonSkill['id']], 'skill' => $toonSkill['tier'], 'max' => $skillData[$toonSkill['id']]['max_tier'] ?? '?']) !!}@if($toonSkill['isZeta']) {{ __('app.check.zeta_missing') }}<span class="icon-zeta"></span>@else {{ __('app.check.omega_missing') }}<span class="icon-omega"></span>@endif</div>
            @if($toonSkill['isZeta'])
            @foreach($zetas ?? [] as $zeta)
                @if( ($zeta['name'] ?? '') == ($toonSkill['nameKey'] ?? '...') )
            <span class="">{!! __('app.check.zeta_ranking', ['zeta' => $zeta['versa'] ?? '', 'route' => route('zetas')]) !!}</span>
                @endif
            @endforeach
            @endif
        @elseif($rosterToon['combatType'] == 'CHARACTER')
        <div class="text-danger"><i class="fa fa-bolt text-danger"></i> {!! __('app.check.skill_is_max_fail', ['name' => $skillKeys[$toonSkill['id']], 'skill' => $toonSkill['tier'], 'max' => $skillData[$toonSkill['id']]['max_tier'] ?? '?']) !!} {{ __('app.check.urgent') }}@if($toonSkill['isZeta']) {{ __('app.check.zeta_missing') }}<span class="icon-zeta"></span>@endif</div>
        @else
        <div class="text-danger"><i class="fa fa-times text-danger"></i> {!! __('app.check.skill_is_max_fail', ['name' => $skillKeys[$toonSkill['id']], 'skill' => $toonSkill['tier'], 'max' => $skillData[$toonSkill['id']]['max_tier'] ?? '?']) !!}</div>
        @endif
    @endforeach
    {{--
<!-- <div class="stats-check-ignore">NOT IMPLEMENTED - abilities check auf fehlende skills</div> -->
<!-- <div class="stats-check-ignore">NOT IMPLEMENTED - abilities check mit zetaliste</div> -->
<!-- <div class="stats-check-ignore">NOT IMPLEMENTED - synergy</div> -->
--}}
