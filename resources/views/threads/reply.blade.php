<reply :attributes="{{ $reply }}" inline-template v-cloak>
    <div id="reply-{{ $reply->id }}" class="card mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5>
                    <a href="{{ route('profile', $reply->owner) }}">
                        {{ $reply->owner->name }}
                    </a> {{ __('wrote') }} {{ $reply->created_at->diffForHumans() }}...
                </h5>

                @if (Auth::check())
                    <div>
                        <favorite :reply="{{ $reply }}"></favorite>
                    </div>
                @endif
            </div>
        </div>

        <div class="card-body">
            <div v-if="editing">
                <div class="form-group">
                    <textarea class="form-control" v-model="body"></textarea>
                </div>

                <button class="btn btn-sm btn-primary" @click="update">{{ __('Update') }}</button>
                <button class="btn btn-sm btn-link" @click="editing = false">{{ __('Cancel') }}</button>
            </div>

            <div v-else v-text="body"></div>
        </div>

        @can ('update', $reply)
            <div class="card-footer">
                <button class="btn btn-sm btn-secondary mr-1" @click="editing = true">{{ __('Edit') }}</button>
                <button class="btn btn-sm btn-danger mr-1" @click="destroy">{{ __('Delete') }}</button>
            </div>
        @endcan
    </div>
</reply>
