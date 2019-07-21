<div class="card mb-3">
    <div class="card-header">{{ __('Members') }}</div>

    <div class="card-body">
        <table class="guild-home-table-OFF"><thead>
        <th>{{ __('fields.name') }}</th>
        <th>{{ __('fields.level') }}</th>
        <th>{{ __('fields.allyCode') }}</th>
        <th>{{ __('Position') }}</th>
        <th>{{ __('Status') }}</th>
        <th>{{ __('Notice') }}</th>
        @role('admin|leader|officer')
        <th>{{ __('Action') }}</th>
        @endrole
        </thead>
        <tbody>
        @forelse($members as $key => $player)
        <tr>
        <!-- <td>{{ $player['id'] }}</td> -->
        <td>{{ $player['name'] }}</td>
        <td>{{ $player['level'] }}</td>
        <td><a href="{{ route('player.home', $player['allyCode']) }}">{{ $player['allyCode'] }}</a></td>
        <td></td>
        <td>{{ $sanctions->where('player.code', $player['allyCode'])->implode('origin', ', ') }} {{ $sanctions->where('player.code', $player['allyCode'])->implode('severity', ', ') }}</td>
        <td><a class="btn btn-link" href="{{ route('sanction', [$page_guild, $player['allyCode']]) }}">{{ $sanctions->where('player.code', $player['allyCode'])->count() }}</a></td>
        @hasanyrole('admin|leader|officer')
        <td class="text-center">
        {!! Form::open( ['method' => 'post', 'url' => route('guild.home', $page_guild), 'style' => 'display: inline']) !!}
            {!! Form::hidden('code', $player['allyCode']) !!}
            @if($key === 'test')
            @role('admin')
            <button type="submit" class="btn btn-sm btn-danger" name="force" value="true">
                <i class="fa fa-refresh"></i>
            </button>
            @endrole
            @else
            <button type="submit" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i>
            </button>
            @role('admin')
            <button type="submit" class="btn btn-sm btn-danger" name="force" value="true">
                <i class="fa fa-refresh"></i>
            </button>
            @endrole
            @endif
        {!! Form::close() !!}
        <a class="btn btn-sm btn-danger" href="{{ route('sanction', [$page_guild, $player['allyCode']]) }}">{{ __('Punish') }}</a>
        </td>
        @endhasanyrole
        </tr>
        @empty
        <!-- nothing -->
        @endforelse
        </tbody></table>
    </div>
</div>
