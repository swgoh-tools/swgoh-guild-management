@extends('layouts.app')

@include('layouts.cdn._trix')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card mb-3">
                    <div class="card-header">{{ __('Create a New Sanction') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('sanction', [$page_guild, $code]) }}">
                            @csrf

                            <div class="form-group">
                                <label for="origin">{{ __('Choose an origin') }}:</label>
                                <select name="origin" id="origin" class="form-control" required>
                                    <option value="">-- {{ __('Choose One') }} --</option>

                                    @foreach($origins as $key => $value)
                                        <option value="{{ $key }}" {{ ( old('origin') ) == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="reason">{{ __('Reason') }}:</label>
                                <input type="text" class="form-control" id="reason" name="reason"
                                       value="{{ old('reason') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="severity">{{ __('Choose a severity') }}:</label>
                                <select name="severity" id="severity" class="form-control" required>
                                    <option value="">-- {{ __('Choose One') }} --</option>

                                    @foreach($severities as $key => $value)
                                        <option value="{{ $key }}" {{ ( old('severity') ) == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="action">{{ __('Choose a action') }}:</label>
                                <select name="action" id="action" class="form-control" required>
                                    <option value="">-- {{ __('Choose One') }} --</option>

                                    @foreach($actions as $key => $value)
                                        <option value="{{ $key }}" {{ ( old('action') ) == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="trix">{{ __('Note') }}:</label>
                                <input id="trix" type="hidden" name="note" value="{{ old('note') }}" required>
                                <trix-editor ref="trix" input="trix" placeholder="{{ __('Have something to say?') }}"></trix-editor>
                            </div>

                            <div class="form-group">
                                {!! Form::label('date', 'date', ['class' => 'control-label']) !!}
                                {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control', 'required' => '']) !!}
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
