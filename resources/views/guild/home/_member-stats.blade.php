<div class="card mb-3">
    <div class="card-header">{{ __('Members') }}</div>

    <div class="card-body">
        <table class="guild-home-table"><thead>
        <th>{{ __('fields.name') }} {{ __('fields.title') }}</th>
        <th>{{ __('fields.level') }}</th>
        <!-- <th>{{ __('fields.title') }}</th> -->
        @forelse($members[0]['stats'] ?? [] as $stat)
        @if($loop->iteration >= $min_iteration && $loop->iteration <= $max_iteration)
        <th>
        <a {{-- style="width:58px;" class="text-truncate d-block" --}} data-toggle="tooltip" data-html="true" title="{{ $stat['nameKey'] }}">{{ $stat['nameKey'] }}</a>
        </th>
        @endif
        @empty
        <!-- nothing -->
        @endforelse
        @if(1 === $min_iteration)
                            <th>{{ __('Arena') }}</th>
                            <th>{{ __('Arena (F)') }}</th>
        @endif
                    </thead>
                    <tbody>
                    @forelse($members as $key => $player)
                    <tr>
                    <!-- <td>{{ $player['id'] }}</td> -->
                    <!-- <td>{{ $player['allyCode'] }}</td> -->
                    <td>{{ $player['name'] }}<br /><em>{{ $playerTitleKeys[$player['titles']['selected'] ?? '-'] ?? $player['titles']['selected'] ?? '-' }}</em></td>
                    <td>{{ $player['level'] }}</td>
                    <!-- <td>{{ $player['titles']['selected'] ?? '-' }}</td> -->
                    <!-- <td>{{ implode(', ', $player['titles']['unlocked'] ?? []) }}</td> -->
@forelse($player['stats'] as $stat)
@if($loop->iteration >= $min_iteration && $loop->iteration <= $max_iteration)
                    <td>
{{ stat_format($stat) }}
                    </td>
@endif
@empty
-
@endforelse
@if(1 === $min_iteration ?? 0)
                    <td><span class="text-hide">{{ str_pad($player['arena']['char']['rank'], 7, '0', STR_PAD_LEFT) }}</span>
<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-html="true" title="
@foreach($player['arena']['char']['squad'] ?? [] as $char)
{{ $char['defId'] }}
@endforeach
">{{ $player['arena']['char']['rank'] }}</button>
                    </td>
                    <td><span class="text-hide">{{ str_pad($player['arena']['ship']['rank'], 7, '0', STR_PAD_LEFT) }}</span>
<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-html="true" title="
@foreach($player['arena']['ship']['squad'] ?? [] as $ship)
{{ $ship['defId'] }}
@endforeach
">{{ $player['arena']['ship']['rank'] }}</button>
                    </td>
@endif
                </tr>
                    @empty
                    <!-- nothing -->
                    @endforelse
                    </tbody></table>
                </div>
            </div>
