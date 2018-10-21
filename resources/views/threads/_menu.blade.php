        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                <div>{{ __('Topic List') }}: &nbsp; </div>
                    <li class="breadcrumb-item"><a href="{{ route('threads') }}"> -{{ __('All Threads') }}- </a></li>
                @foreach ($channels as $channel)
                    <li class="breadcrumb-item"><a href="{{ route('threads') }}/{{ $channel->slug }}"> {{ $channel->title }} </a></li>
                @endforeach
                    </ol>
                </nav>
            </div>
        </div>
