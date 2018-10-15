@extends('layouts.app')

@include('layouts.cdn._trix')

@section('content')
    <thread-view :thread="{{ $thread }}" inline-template>
        <div class="container">
        @include ('threads._menu')
            <div class="row">
                <div class="col-md-8" v-cloak>
                    @include ('threads._question')

                    <replies @added="repliesCount++" @removed="repliesCount--"></replies>
                </div>

                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <p>
                                {{ __('This thread was published') }} {{ $thread->created_at->diffForHumans() }} {{ __('by') }}
                                <a href="#">{{ $thread->creator->name }}</a> {{ __('and currently has') }}
                                <span v-text="repliesCount"></span> {{ trans_choice('app.comments', $thread->replies_count) }}
                                .
                            </p>

                            <p>
                                <subscribe-button :active="{{ json_encode($thread->isSubscribedTo) }}" v-if="signedIn"></subscribe-button>

                                <button class="btn btn-secondary"
                                        v-if="authorize('isAdmin')"
                                        @click="toggleLock"
                                        v-text="locked ? 'Unlock' : 'Lock'"></button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </thread-view>
@endsection
