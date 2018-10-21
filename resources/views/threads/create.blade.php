@extends('layouts.app')

@include('layouts.cdn._trix')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card mb-3">
                    <div class="card-header">{{ __('Create a New Thread') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('threads') }}">
                            @csrf

                            <div class="form-group">
                                <label for="channel_id">{{ __('Choose a Channel') }}:</label>
                                <select name="channel_id" id="channel_id" class="form-control" required>
                                    <option value="">- {{ __('Choose One') }} -</option>

                                    @foreach ($channels as $channel)
                                        <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                            {{ $channel->title }}
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
                                <wysiwyg name="body"></wysiwyg>
                            </div>

                            <div class="form-group">
                                <!-- <div class="g-recaptcha" data-sitekey="6LeXrDUUAAAAAFco7ShbMrJx0fh-ZrLxK9Amd-zP"></div> -->
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
