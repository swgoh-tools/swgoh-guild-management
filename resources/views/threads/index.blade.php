@extends('layouts.app')

@include('layouts.cdn._trix')

@section('content')
    <div class="container">
        @include ('threads._menu')
        <div class="row">
            <div class="col-md-8">
                @include ('threads._list')

                {{ $threads->render() }}
            </div>

            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">
                        {{ __('Search') }}
                    </div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('threads.search') }}">
                            <div class="form-group">
                                <input type="text" placeholder="{{ __('Search for something...') }}" name="q" class="form-control">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-secondary" type="submit">{{ __('Search') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                @if (count($trending))
                    <div class="card mb-3">
                        <div class="card-header">
                            {{ __('Trending Threads') }}
                        </div>

                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($trending as $thread)
                                    <li class="list-group-item">
                                        <a href="{{ url($thread->path) }}">
                                            {{ $thread->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
