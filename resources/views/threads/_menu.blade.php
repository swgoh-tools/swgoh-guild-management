        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                <div>Themenkatalog: &nbsp; </div>
                @foreach ($channels as $channel)
                        <li class="breadcrumb-item"><a href="{{ route('threads') }}/{{ $channel->slug }}"> {{ $channel->name }} </a></li>
                @endforeach
                    </ol>
                </nav>
            </div>
        </div>
