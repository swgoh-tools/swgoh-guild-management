<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand disabled text-light" href="{{ route('guild.home', $guild) }}">{{ $guild->name }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item active"> -->
                <!-- <a class="nav-link" href=">Infos <span class="sr-only">(current)</span></a> -->
            <!-- </li> -->
            @switch(count($pages ?? []))
                @case(0)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('guild.pages', $guild) }}">{{ __('Guild-Created Content') }}</a>
                    </li>
                    @break

                @case(1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ $pages->first()->path() }}">{{ $pages->first()->title }}</a>
                    </li>
                    @break

                @default
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{ __('Guild-Created Content') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @forelse ($pages as $page)
                        <a class="dropdown-item" href="{{ $page->path() }}">{{ $page->title }}</a>
                        @empty
                        <a class="dropdown-item" href="{{ route('guild.pages', $guild) }}">{{ __('Guild-Created Content') }}</a>
                        @endforelse
                    </div>
                </li>

            @endswitch

            @can('edit pages')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pages.create') }}"><i class="fa fa-plus"></i></a>
                    </li>
            @endcan
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ __('Team Search') }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('guild.stats', $guild) }}">{{ __('Guild State') }}</a>
                    <a class="dropdown-item" href="{{ route('guild.stats', [$guild, 'raid-hstr']) }}">{{ __('HSTR Special') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('guild.list.squads', $guild) }}">{{ __('Predefined Teams') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('guild.team.toons', $guild) }}">{{ __('Team Search') }} - {{ __('Toons') }}</a>
                    <a class="dropdown-item" href="{{ route('guild.team.ships', $guild) }}">{{ __('Team Search') }} - {{ __('Ships') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('guild.toons', $guild) }}">{{ __('Full Roster') }} - {{ __('Toons') }} ({{ __('big data') }}!)</a>
                    <a class="dropdown-item" href="{{ route('guild.ships', $guild) }}">{{ __('Full Roster') }} - {{ __('Ships') }} ({{ __('big data') }}!)</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ __('Game Data') }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('guild.list.zetas', $guild) }}">{{ __('Zeta List') }}</a>
                    <a class="dropdown-item" href="{{ route('guild.list.events', $guild) }}">{{ __('Event List') }}</a>
                    <a class="dropdown-item" href="{{ route('guild.list.targeting', $guild) }}">{{ __('AI Targeting List') }}</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropForum" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ __('Forum') }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropForum">
                    <a class="dropdown-item" href="{{ route('threads') }}">{{ __('All Threads') }}</a>
                    @if (auth()->check())
                    <a class="dropdown-item" href="{{ route('threads') }}?by={{ auth()->user()->name }}">{{ __('My Threads') }}</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('threads') }}?popular=1">{{ __('Popular Threads') }}</a>
                    <a class="dropdown-item" href="{{ route('threads') }}?unanswered=1">{{ __('Unanswered Threads') }}</a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="{{ route('threads.create') }}">{{ __('Create New Thread') }}</a>
                </div>
            </li>
        </ul>
            <a class="btn btn-outline-success my-2 my-sm-0" href="{{ route('sync') }}">{{ __('Sync') }}</a>
        <!--<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{ __('Search') }}</button>
          </form>-->
        @if (Route::has('login'))
        <div class="navbar-nav">
            @auth
            <user-notifications></user-notifications>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropLogin" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropLogin">
                        <a class="dropdown-item" href="{{ route('home') }}">{{ __('Home') }}</a>
                        <a class="dropdown-item" href="{{ route('profile', Auth::user()) }}">{{ __('My Profile') }}</a>
                        <a class="dropdown-item" href="{{ route('user.edit', Auth::user()->id) }}">{{ __('My Data') }}</a>
                        @if (Auth::user()->isAdmin())
                        <a class="dropdown-item" href="{{ route('notifications', Auth::user()) }}">{{ __('Notifications') }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.guilds.create') }}">{{ __('Create a New Guild') }}</a>
                        <a class="dropdown-item" href="{{ route('pages.create') }}">{{ __('Create a New Page') }}</a>
                        <a class="dropdown-item" href="{{ route('memos.create') }}">{{ __('Create a New Memo') }}</a>
                        <a class="dropdown-item" href="{{ route('channels.create') }}">{{ __('Create a New Channel') }}</a>
                        <a class="dropdown-item" href="{{ route('files.upload') }}">{{ __('Upload a New File') }}</a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                    </div>
                </li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @else
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
            @endauth
        </div>
        @endif
    </div>

</nav>
