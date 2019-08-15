<div class="text-center">
    <div class="alert alert-info" role="alert">
        <a href="{{ route('player.home', $info['allyCode']) }}">{{ __('Dashboard') }}</a>
        <i class="fa fa-resistance"></i>
        <a href="{{ route('player.stats', $info['allyCode']) }}">{{ __('Team Check') }}</a>
        |
        <a href="{{ route('player.stats.full', $info['allyCode']) }}">{{ __('Team Check') }} ({{ __('detailed') }})</a>
        <i class="fa fa-empire"></i>
        <a href="{{ route('player.gear', $info['allyCode']) }}">{{ __('Gear Check') }}</a>
        |
        <a href="{{ route('player.stats.gear', $info['allyCode']) }}">{{ __('Gear Stats') }}</a>
        |
        <a href="{{ route('player.stats.salvage', $info['allyCode']) }}">{{ __('Salvage Stats') }}</a>
        <i class="fa fa-resistance"></i>
        <a href="{{ route('player.toons', $info['allyCode']) }}">{{ __('Toons') }} ({{ __('Big Data!') }})</a>
        |
        <a href="{{ route('player.roster', $info['allyCode']) }}">{{ __('Roster') }}</a>
    </div>

    <h1 class="mr-auto">{{ $info['name'] }}</h1>
</div>
