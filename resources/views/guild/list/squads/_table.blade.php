@if ($loop->first)
    <table class="table table-hover toon-table">
    <!-- table-striped table-dark table-sm  -->
        <thead>
            <tr>
                <th>#</th>
                <th>Link</th>
                @forelse ($squad as $info_key => $info)
                <!-- excluded from whitelist: main,  -->
                @if(in_array($info_key, ['name', 'note', 'team', 'url']))
                    <th>{{ __('fields.' . $info_key) }}</th>
                @endif
                @empty
<!-- no entries -->
                @endforelse
            </tr>
        </thead>
        <tbody>
@endif
        <tr>
            <td>{{ $squad_key }}</td>
            <td>
            @if(is_array($squad['team'] ?? 'NOARRAY'))
            @php($team_plain = [])
            @php($chunk_size = 10)
                @foreach($squad['team'] as $toon)
                    @php($team_plain[] = explode(':', $toon)[0])
                @endforeach
                @foreach(array_chunk($team_plain, $chunk_size) as $team_part)
                @if(count($squad['team']) <= 5)
                <a class="text-link" href="{{ route('guild.team.toons', $page_guild) }}?t={{ implode(',', $team_part) }}">list</a>
                @else
                <a class="text-link" href="{{ route('guild.team.toons', $page_guild) }}?t={{ implode(',', $team_part) }}">list/{{ count($team_part) }}</a>
                @endif
                @endforeach
                {{-- @if(count($squad['team']) > $chunk_size)({{ count($squad['team']) }})@endif --}}
            @else
            -
            @endif
            </td>
            @forelse ($squad as $info_key => $info)
                <!-- excluded from whitelist: main,  -->
                @if(!in_array($info_key, ['name', 'note', 'team', 'url']))
                    <!-- skip -->
                @elseif($info_key == 'url')
                    <td>@if($info)<a href="{{ $info }}">link</a>@endif</td>
                @elseif($info_key == 'name')
                    <td>{{ ucwords(strtolower($info ?? '')) }} @if($squad['main'] ?? false)<i class="fa fa-thumbs-o-up" aria-hidden="true" title="{{ __('Primary Team') }}"></i>@endif</td>
                @elseif($info_key == 'team' && is_array($info))
                    <td>
                    @forelse ($info as $toon_key => $toon)
@foreach (preg_split('/:/', $toon) as $toonValue)
@if($loop->first){{ $unitKeys[$toonValue]['name'] ?? $toonValue }}@else <div class="mytooltip mytooltip-top mytooltip-no-wrap icon-zeta"><span class="mytooltiptext">{{ $skillKeys[$toonValue] ?? $toonValue }}</span></div>@endif
@endforeach
@if(!$loop->last),@endif
                    @empty
                        <!-- no entries -->
                        no team members found!
                    @endforelse
                    </td>
                @elseif(is_array($info))
                    <td>{{ implode(', ', $info) }}x </td>
                @else
                    <td>{{ $info }}</td>
                @endif
                @empty
<!-- no entries -->
            @endforelse
            </tr>

@if ($loop->last)
        </tbody>
    </table>
@endif
