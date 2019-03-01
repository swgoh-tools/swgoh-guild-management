<div class="card mb-3">
                <div class="card-header">{{ __('Members') }}</div>

                <div class="card-body">
                    <table class="guild-home-table"><thead>
                    <th>{{ __('fields.name') }} {{ __('fields.title') }}</th>
                    <th>{{ __('fields.level') }}</th>
                    <!-- <th>{{ __('fields.title') }}</th> -->
@forelse($members[0]['stats'] ?? [] as $stat)
@if($loop->iteration > 5)
<th>
<a {{-- style="width:58px;" class="text-truncate d-block" --}} data-toggle="tooltip" data-html="true" title="{{ $stat['nameKey'] }}">{{ $stat['nameKey'] }}</a>
</th>
@endif
@empty
<!-- nothing -->
@endforelse
                    <!-- <th>{{ __('fields.stats') }}</th> -->
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
@if($loop->iteration > 5)
                    <td>
{{ number_format($stat['value']) }}
                    </td>
                    @endif
@empty
-
@endforelse
                    </tr>
                    @empty
                    <!-- nothing -->
                    @endforelse
                    </tbody></table>
                </div>
            </div>
