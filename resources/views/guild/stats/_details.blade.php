<h2>{{ $team['name'] ?? $key ?? 'PLACEHOLDER' }}</h2>
            <table class="table table-striped table-responsive table-sm">
                <tr>
                    <!-- <th class="rotate"><div><span>{{ __('Event') }}</span></div></th> -->
                    <th class="rotate"><div><span>{{ __('fields.phase') }}</span></div></th>
                    <th class="rotate"><div><span>{{ __('fields.rarity') }}</span></div></th>
                    <th class="rotate"><div><span>{{ __('fields.gear') }}</span></div></th>
                    <th class="rotate"><div><span>{{ __('fields.level') }}</span></div></th>
                    <th class="rotate"><div><span>{{ __('fields.team') }}</span></div></th>
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
@if($tmpTeam['stats']['level'] < $tmpTeam['size']){{$tmpTeam['stats']['level']}}/{{ $tmpTeam['size'] }} {{ __('Chars are leveled enough.') }}<br />@endif
@if($tmpTeam['stats']['gear'] < $tmpTeam['size']){{$tmpTeam['stats']['gear']}}/{{ $tmpTeam['size'] }} {{ __('Chars are geared enough.') }}<br />@endif
@if($tmpTeam['stats']['rarity'] < $tmpTeam['size']){{$tmpTeam['stats']['rarity']}}/{{ $tmpTeam['size'] }} {{ __('Chars have enough stars.') }}<br />@endif
@if($tmpTeam['stats']['zetas'] < $tmpTeam['size']){{$tmpTeam['stats']['zetas']}}/{{ $tmpTeam['size'] }} {{ __('Chars have enough zetas.') }}<br />@endif
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
