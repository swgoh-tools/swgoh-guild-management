@extends('layouts.app')

@include('layouts.cdn._trix')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card mb-3">
                    <div class="card-header">{{ __('Create a New Memo') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('memos') }}">
                            @csrf

                            <div class="form-group">
                                <label for="page_id">{{ __('Choose a Page') }}:</label>
                                <select name="page_id" id="page_id" class="form-control" required>
                                    <option value="">-- {{ __('Choose One') }} --</option>

                                    @foreach ($pages as $page)
                                        <option value="{{ $page->id }}" {{ old('page_id') == $page->id ? 'selected' : '' }}>
                                            {{ $page->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('Title') }}:</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ old('title') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="trix">{{ __('Content') }}:</label>
                                <input id="trix" type="hidden" name="body" value="{{ old('body') }}" required>
                                <trix-editor ref="trix" input="trix" placeholder="{{ __('Have something to say?') }}"></trix-editor>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Publish') }}</button>
                            </div>

                            @if (count($errors))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection