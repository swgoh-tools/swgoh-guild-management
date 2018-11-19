<div class="row">
    <div class="card"><div class="card-header">{{ __('Unit Info') }}</div><div class="card-body">
    <table>
    <!-- <tr><th>{{ __('app.data_keys.id') }}</th><td class="text-right">{{ $unit['id'] ?? '' }}</td></tr> -->
    <tr><th>{{ __('app.data_keys.defId') }}</th><td class="text-right">{{ $unit['defId'] ?? '' }}</td></tr>
    <tr><th>{{ __('app.data_keys.nameKey') }}</th><td class="text-right">{{ $unit['nameKey'] ?? '' }}</td></tr>
    <tr><th>{{ __('app.data_keys.rarity') }}</th><td class="text-right">{{ $unit['rarity'] ?? '' }}</td></tr>
    <tr><th>{{ __('app.data_keys.level') }}</th><td class="text-right">{{ $unit['level'] ?? '' }}</td></tr>
    <tr><th>{{ __('app.data_keys.xp') }}</th><td class="text-right">{{ $unit['xp'] ?? '' }}</td></tr>
    <tr><th>{{ __('app.data_keys.gear') }}</th><td class="text-right">{{ $unit['gear'] ?? '' }}</td></tr>
    <tr><th>{{ __('app.data_keys.combatType') }}</th><td class="text-right">{{ $unit['combatType'] ?? '' }}</td></tr>
    <tr><th>{{ __('app.data_keys.gp') }}</th><td class="text-right">{{ $unit['gp'] ?? '' }}</td></tr>
    </table>
    </div></div>
    <div class="card"><div class="card-header">{{ __('app.data_keys.equipped') }}</div><div class="card-body">
    <table>
    @foreach($unit['equipped'] ?? [] as $equipped)
    <tr><th>{{ __('app.data_keys.slot') }} {{ $equipped['slot'] ?? '' }}</th><td>{{ $equipped['nameKey'] ?? '' }}</td></tr>
    @endforeach
    </table>
    </div></div>
    <div class="card"><div class="card-header">{{ __('app.data_keys.skills') }}</div><div class="card-body">
    <table>
    @foreach($unit['skills'] ?? [] as $skills)
    <tr><th>{{ $skills['nameKey'] ?? '' }}</th><td>{{ $skills['tier'] ?? '' }}</td><td>{{ $skills['isZeta'] ?? false ? 'zeta' : '' }}</td></tr>
    @endforeach
    </table>
    </div></div>
    <div class="card"><div class="card-header">{{ __('app.data_keys.mods') }}</div><div class="card-body">
    <table>
    @foreach($unit['mods'] ?? [] as $mods)
    <tr>
        <th>{{ __('app.data_keys.slot') }} {{ $mods['slot'] ?? '' }}</th>
        <td>{{ $mods['tier'] ?? '' }}</td>
        <td>{{ $mods['level'] ?? '' }}</td>
        <td>{{ $mods['pips'] ?? '' }}</td>
        <td>{{ $mods['set'] ?? '' }}</td>
        <td>{{ $mods['primaryStat']['unitStat'] ?? '' }} {{ $mods['primaryStat']['value'] ?? '' }}</td>
        <td>@foreach($mods['secondaryStat'] ?? [] as $secstat)
        {{ $secstat['unitStat'] ?? '' }}: {{ $secstat['value'] ?? '' }} ({{ $secstat['roll'] ?? '' }})
        @endforeach</td>
    </tr>
    @endforeach
    </table>
    </div></div>
    <div class="card"><div class="card-header">{{ __('app.data_keys.crew') }}</div><div class="card-body">
    <table>
    @foreach($unit['crew'] ?? [] as $crew)
    <tr>
        <th>{{ __('app.data_keys.slot') }} {{ $crew['slot'] ?? '' }}</th>
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
