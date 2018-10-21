{{-- Editing the question. --}}
<div class="card mb-3" v-if="editing">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <input type="text" class="form-control" v-model="form.title">
        </div>
    </div>

    <div class="card-body">
        <div class="form-group">
            <wysiwyg v-model="form.body"></wysiwyg>
        </div>
    </div>

    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <button class="btn btn-sm btn-secondary" @click="editing = true" v-show="! editing">{{ __('Edit') }}</button>
            <button class="btn btn-sm btn-primary" @click="update">{{ __('Update') }}</button>
            <button class="btn btn-sm btn-warning" @click="resetForm">{{ __('Cancel') }}</button>

            @can ('update', $thread)
                <form action="{{ $thread->path() }}" method="POST" class="ml-a">
                    @csrf
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-link">{{ __('Delete Thread') }}</button>
                </form>
            @endcan

        </div>
    </div>
</div>


{{-- Viewing the question. --}}
<div class="card mb-3" v-else>
    <div class="card-header">
        <div class="level">
            <img src="{{ $thread->creator->avatar_path }}"
                 alt="{{ $thread->creator->name }}"
                 width="25"
                 height="25"
                 class="mr-1">

            <span class="flex">
                <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> posted: <span v-text="title"></span>
            </span>
        </div>
    </div>

    <div class="card-body" v-html="body"></div>

    <div class="card-footer" v-if="authorize('owns', thread)">
        <button class="btn btn-sm btn-secondary" @click="editing = true">Edit</button>
    </div>
</div>