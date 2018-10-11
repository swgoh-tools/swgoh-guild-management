@extends('layouts.app')

@section('content')
    <div class="container">
    @include ('threads._menu')
        <div class="row">
            <ais-index
                app-id="{{ config('scout.algolia.id') }}"
                api-key="{{ config('scout.algolia.key') }}"
                index-name="threads"
                query="{{ request('q') }}"
            >
                <div class="col-md-8">
                    <ais-results>
                        <template scope="{ result }">
                            <li>
                                <a :href="result.path">
                                    <ais-highlight :result="result" attribute-name="title"></ais-highlight>
                                </a>
                            </li>
                        </template>
                    </ais-results>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Search
                        </div>

                        <div class="card-body">
                            <ais-search-box>
                                <ais-input placeholder="Find a thread..." :autofocus="true" class="form-control"></ais-input>
                            </ais-search-box>
                        </div>
                        <img class="bg-secondary" src="{{ asset('/svg/search-by-algolia.svg') }}" alt="search-by-algolia">
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Filter By Channel
                        </div>

                        <div class="card-body">
                            <ais-refinement-list attribute-name="channel.title"></ais-refinement-list>
                        </div>
                    </div>

                    @if (count($trending))
                        <div class="card">
                            <div class="card-header">
                                Trending Threads
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
            </ais-index>
        </div>
    </div>
@endsection
