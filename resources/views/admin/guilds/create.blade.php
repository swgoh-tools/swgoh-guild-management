@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card mb-3">
                    <div class="card-header">{{ __('Create a New Guild') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('guilds') }}">
                            @csrf

                            <div class="form-group">
                                <label for="user_id">{{ __('Choose a Leader') }}:</label>
                                <select name="user_id" id="user_id" class="form-control" required>
                                    <option value="">-- {{ __('Choose One') }} --</option>

                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="code">{{ __('Guild Code') }} ({{ __('if known') }}):</label>
                                <input type="text" class="form-control" id="code" name="code"
                                       value="{{ old('code') }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
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
