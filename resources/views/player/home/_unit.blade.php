<div class="row justify-content-center">
    <div class="col">
        <span class="text-muted">{{ $unit['desc'] ?? '-' }}</span>
    </div>
</div>
<div class="row">
    <div class="card"><div class="card-header">{{ __('Unit Info') }}</div><div class="card-body">
    <table>
    <!-- <tr><th>{{ __('fields.id') }}</th><td class="text-right">{{ $unit['id'] ?? '' }}</td></tr> -->
    <tr><th>{{ __('fields.defId') }}</th><td class="text-right">{{ $unit['defId'] ?? '' }}</td></tr>
    <tr><th>{{ __('fields.nameKey') }}</th><td class="text-right">{{ $unit['nameKey'] ?? '' }}</td></tr>
    <tr><th>{{ __('fields.combatType') }}</th><td class="text-right">{{ $unit['combatType'] ?? '' }}</td></tr>
    <tr><th>{{ __('fields.gp') }}</th><td class="text-right">{{ $unit['gp'] ?? '' }}</td></tr>
    <tr><th>{{ __('fields.rarity') }}</th><td class="text-right">{{ $unit['rarity'] ?? '' }}</td></tr>
    <tr><th>{{ __('fields.level') }}</th><td class="text-right">{{ $unit['level'] ?? '' }}</td></tr>
    <!-- <tr><th>{{ __('fields.xp') }}</th><td class="text-right">{{ $unit['xp'] ?? '' }}</td></tr> -->
    <tr><th>{{ __('fields.gear') }}</th><td class="text-right">{{ $unit['gear'] ?? '' }}</td></tr>
    </table>
    </div></div>
    <div class="card"><div class="card-header">{{ __('fields.equipped') }}</div><div class="card-body">
    <table>
    @foreach($unit['equipped'] ?? [] as $equipped)
    <tr><th>{{ __('fields.slot') }} {{ $equipped['slot'] ?? '' }}</th><td>{{ $equipped['nameKey'] ?? '' }}</td></tr>
    @endforeach
    </table>
    </div></div>
    <div class="card"><div class="card-header">{{ __('fields.skills') }}</div><div class="card-body">
    <table>
    @foreach($unit['skills'] ?? [] as $skills)
    <tr><th>{{ $skillKeys[$skills['id']] ?? $skills['nameKey'] ?? '' }}</th><td>{{ $skills['tier'] ?? '' }}</td><td>{{ $skills['isZeta'] ?? false ? 'zeta' : '' }}</td><td><span class="small text-muted">@if ( ($skills['nameKey'] ?? false) && ($skillKeys[$skills['id']] ?? '') <> ($skills['nameKey'] ?? '')){{ $skills['nameKey'] }}@endif</span></td></tr>
    @endforeach
    </table>
    </div></div>
    <div class="card"><div class="card-header">{{ __('fields.mods') }}</div><div class="card-body">
    <table>
    @foreach($unit['mods'] ?? [] as $mods)
    <tr>
        <th>{{ __('fields.slot') }} {{ $mods['slot'] ?? '' }}</th>
        <td>{{ $mods['tier'] ?? '' }}</td>
        <td>{{ $mods['level'] ?? '' }}</td>
        <td>{{ $mods['pips'] ?? '' }}</td>
        <td>{{ $mods['set'] ?? '' }}</td>
        <td>{{ $unitStatKeys[$mods['primaryStat']['unitStat'] ?? '']['name'] ?? '' }} {{ $mods['primaryStat']['value'] ?? '' }}</td>
        <td>@foreach($mods['secondaryStat'] ?? [] as $secstat)
        {{ $unitStatKeys[$secstat['unitStat'] ?? '']['name'] ?? '' }}: {{ $secstat['value'] ?? '' }} ({{ $secstat['roll'] ?? '' }})
        @endforeach</td>
    </tr>
    @endforeach
    </table>
    </div></div>
    <div class="card"><div class="card-header">{{ __('fields.crew') }}</div><div class="card-body">
    <table>
    @foreach($unit['crew'] ?? [] as $crew)
    <tr>
        <th>{{ __('fields.slot') }} {{ $crew['slot'] ?? '' }}</th>
        <td>{{ $crew['unitId'] ?? '' }}</td>
        <td>{{ $crew['gp'] ?? '' }}</td>
        <td>{{ $crew['cp'] ?? '' }}</td>
        <td>@foreach($crew['skillReferenceList'] ?? [] as $skillref)
        {{ $skillref['skillId'] ?? '' }}: {{ $skillref['requiredTier'] ?? '' }} ({{ $skillref['requiredRarity'] ?? '' }})
        @endforeach</td>
    </tr>
    @endforeach
    </table>
    </div></div>
</div>
