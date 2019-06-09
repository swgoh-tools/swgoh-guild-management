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
</table>
