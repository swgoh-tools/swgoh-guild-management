<div class="row">
    <div class="card col-4 p-0"><div class="card-header">{{ __('Player Info') }}</div><div class="card-body">
    <table>
    <tr><th>{{ __('fields.id') }}</th><td class="text-right">{{ $info['id'] ?? '' }}</td></tr>
    <tr><th>{{ __('fields.allyCode') }}</th><td class="text-right">{{ $info['allyCode'] ?? '' }}</td></tr>
    <tr><th>{{ __('fields.level') }}</th><td class="text-right">{{ $info['level'] ?? '' }}</td></tr>
    <tr><th>{{ __('fields.titles') }}</th><td class="text-right">
    @foreach($info['titles']['unlocked'] ?? [] as $playertitle)
        @if( ($info['titles']['selected'] ?? '-') == $playertitle)<strong><em>@endif
        @if(!$loop->last)
        {{ $playerTitleKeys[$playertitle] ?? $playertitle ?? '-' }},
        @else
        {{ $playerTitleKeys[$playertitle] ?? $playertitle ?? '-' }}
        @endif
        @if( ($info['titles']['selected'] ?? '-') == $playertitle)</em></strong>@endif
    @endforeach</td></tr>
    </table>
    </div></div>
    <div class="card"><div class="card-header">{{ __('Guild Info') }}</div><div class="card-body">
    <table>
    <tr><th>{{ __('fields.guildRefId') }}</th><td class="text-right">{{ $info['guildRefId'] ?? '' }}</td></tr>
    <tr><th>{{ __('fields.guildName') }}</th><td class="text-right">{{ $info['guildName'] ?? '' }}</td></tr>
    <tr><th>{{ __('fields.guildBannerColor') }}</th><td class="text-right">{{ $info['guildBannerColor'] ?? '' }}</td></tr>
    <tr><th>{{ __('fields.guildBannerLogo') }}</th><td class="text-right">{{ $info['guildBannerLogo'] ?? '' }}</td></tr>
    <tr><th>{{ __('fields.guildTypeId') }}</th><td class="text-right">{{ $info['guildTypeId'] ?? '' }}</td></tr>
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
