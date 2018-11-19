<div class="row">
    <div class="card"><div class="card-header">{{ __('Player Info') }}</div><div class="card-body">
    <table>
    <tr><th>{{ __('app.data_keys.id') }}</th><td class="text-right">{{ $info['id'] ?? '' }}</td></tr>
    <tr><th>{{ __('app.data_keys.level') }}</th><td class="text-right">{{ $info['level'] ?? '' }}</td></tr>
    <tr><th>{{ __('app.data_keys.allyCode') }}</th><td class="text-right">{{ $info['allyCode'] ?? '' }}</td></tr>
    <tr><th>{{ __('app.data_keys.titles') }}</th><td class="text-right">{{ $info['titles']['selected'] ?? '' }}<br />{{ implode(', ', $info['titles']['unlocked'] ?? []) }}</td></tr>
    </table>
    </div></div>
    <div class="card"><div class="card-header">{{ __('Guild Info') }}</div><div class="card-body">
    <table>
    <tr><th>{{ __('app.data_keys.guildRefId') }}</th><td class="text-right">{{ $info['guildRefId'] ?? '' }}</td></tr>
    <tr><th>{{ __('app.data_keys.guildName') }}</th><td class="text-right">{{ $info['guildName'] ?? '' }}</td></tr>
    <tr><th>{{ __('app.data_keys.guildBannerColor') }}</th><td class="text-right">{{ $info['guildBannerColor'] ?? '' }}</td></tr>
    <tr><th>{{ __('app.data_keys.guildBannerLogo') }}</th><td class="text-right">{{ $info['guildBannerLogo'] ?? '' }}</td></tr>
    <tr><th>{{ __('app.data_keys.guildTypeId') }}</th><td class="text-right">{{ $info['guildTypeId'] ?? '' }}</td></tr>
    </table>
    </div></div>
    <div class="card"><div class="card-header">{{ __('Player Stats') }}</div><div class="card-body">
    <table>
    @foreach($info['stats'] ?? [] as $stat)
    <tr><th>{{ __($stat['nameKey'] ?? '') }}</th><td class="text-right">{{ number_format($stat['value'] ?? '') }}</td></tr>
    @endforeach
    </table>
    </div></div>
</div>
