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
        <td>{{ '' }}</td>
        <td>{{ '' }}</td>
        <td>{{ '' }}</td>
        @role('admin')
        <td>{{ '' }}</td>
        @endrole
        </tr>
        @empty
        <!-- nothing -->
        @endforelse
        </tbody></table>
    </div>
</div>
