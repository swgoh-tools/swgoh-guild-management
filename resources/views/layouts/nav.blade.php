<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand disabled text-light">{{ $guild->name }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item active"> -->
                <!-- <a class="nav-link" href="{{ route('guild.info', $guild) }}">Infos <span class="sr-only">(current)</span></a> -->
            <!-- </li> -->
            @foreach ($pages as $page)
            <li class="nav-item">
                <a class="nav-link" href="{{ $page->path() }}">{{ $page->title }}</a>
            </li>
            @endforeach
            @can('edit pages')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pages.create') }}"><i class="fa fa-plus"></i></a>
                    </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link" href="{{ route('guild.squads', $guild) }}">Teamsuche</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Vordefinierte Teams
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('guild.squads', $guild) }}?t1=ADMIRALACKBAR&t2=BB8&t3=COMMANDERLUKESKYWALKER&t4=HERMITYODA&t5=EZRABRIDGERS3">Ezradicator</a>
                    <a class="dropdown-item" href="{{ route('guild.squads', $guild) }}?t1=VADER&t2=WAMPA&t3=GRANDADMIRALTHRAWN&t4=COMMANDERLUKESKYWALKER&t5=BB8">Wampanader</a>
                    <a class="dropdown-item" href="{{ route('guild.squads', $guild) }}?t1=ADMIRALACKBAR&t2=COMMANDERLUKESKYWALKER&t3=BB8&t4=GRANDADMIRALTHRAWN&t5=ASAJVENTRESS">ABC</a>
                    <a class="dropdown-item" href="{{ route('guild.squads', $guild) }}?t1=ADMIRALACKBAR&t2=BB8&t3=COMMANDERLUKESKYWALKER&t4=HERMITYODA&t5=YOUNGHAN">YOLO
                        SOLO</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('guild.roster', $guild) }}">Gesamtliste</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropForum" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Forum
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropForum">
                    <a class="dropdown-item" href="{{ route('threads') }}">All Threads</a>
                    @if (auth()->check())
                    <a class="dropdown-item" href="{{ route('threads') }}?by={{ auth()->user()->name }}">My Threads</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('threads') }}?popular=1">Popular Threads</a>
                    <a class="dropdown-item" href="{{ route('threads') }}?unanswered=1">Unanswered Threads</a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="{{ route('threads.create') }}">New Thread</a>
                </div>
            </li>
        </ul>
            <a class="btn btn-outline-success my-2 my-sm-0" href="{{ route('sync') }}">Sync</a>
        <!--<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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
                    <div class="dropdown-menu" aria-labelledby="navbarDropLogin">
                        <a class="dropdown-item" href="{{ route('home') }}">Home</a>
                        <a class="dropdown-item" href="{{ route('profile', Auth::user()) }}">My Profile</a>
                        @if (Auth::user()->isAdmin())
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('guilds.create') }}">New Guild</a>
                        <a class="dropdown-item" href="{{ route('pages.create') }}">New Page</a>
                        <a class="dropdown-item" href="{{ route('memos.create') }}">New Memo</a>
                        <a class="dropdown-item" href="{{ route('channels.create') }}">New Channel</a>
                        <a class="dropdown-item" href="{{ route('files.upload') }}">Upload File</a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout</a>
                    </div>
                </li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @else
            <a class="nav-link" href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>

</nav>