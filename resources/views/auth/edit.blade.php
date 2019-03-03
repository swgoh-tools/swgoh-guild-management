@extends('layouts.app')

@section('content')
<div class="container">

<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">{{ __('Guild') }}</div>

                <div class="card-body">
                        @if(!auth()->user()->confirmed)
                        <div class="alert alert-danger" role="alert">
                            {{ __('auth.not-confirmed') }}
                        </div>
                        @endif
                        @if(!auth()->user()->code)
                        <div class="alert alert-warning" role="alert">
                            {{ __('auth.no-allycode') }}
                        </div>
                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-4 text-md-right">
                                <span class="form-text">{{ $player['guildName'] ?? '-' }}</span>
                            </div>

                            <div class="col-md-6">
                                @if($my_guild)
                                <a class="form-text" href="{{ route('guild.home', $my_guild ?? '') }}">{{ route('guild.home', $my_guild ?? '') }}</a>
                                @else
                                <div class="form-text">{{ _('Guild page not yet created.') }}</div>
                                <small id="guildHelp" class="form-text text-muted">{{ __('auth.tip.guild-missing') }}</small>
                                @endif
                                <small class="form-text text-muted">{{ $player['id'] ?? '-' }} {{ $player['name'] ?? '-' }}</small>
                                <small class="form-text text-muted">{{ $player['guildRefId'] ?? '-' }} {{ $player['guildName'] ?? '-' }}</small>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-4 text-md-right">
                                <span class="form-text">{{ _('Current Selection') }}</span>
                            </div>

                            <div class="col-md-6">
                                <a class="form-text" href="{{ route('guild.home', $guild) }}">{{ route('guild.home', $guild) }}</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update', Auth::user()->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ?? $user->name }}" required autofocus>
                                <small id="nameHelp" class="form-text text-muted">{{ __('auth.tip.name') }}</small>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') ?? $user->email }}" required>
                                <small id="emailHelp" class="form-text text-muted">{{ __('auth.tip.email') }}</small>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Ally Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code') ?? $user->code }}">
                                <small id="codeHelp" class="form-text text-muted">{{ __('auth.tip.code') }}</small>
                                @if ($errors->has('code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                                <small id="codeHelp" class="form-text text-muted">{{ __('auth.tip.password-change') }}</small>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">{{ __('Roles & Permissions') }}</div>

                <div class="card-body">

                    <!-- Roles Form Input -->
                    <div class="form-group @if ($errors->has('roles')) has-error @endif">
                        {!! Form::label('roles[]', __('Roles')) !!}
                        {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null,  ['class' => 'form-control', 'multiple', 'disabled']) !!}
                        <small id="rolesHelp" class="form-text text-muted">{{ __('auth.tip.roles') }}</small>
                    </div>

                    <div class="form-group mb-0">
                        {!! Form::label('permissions[]', __('Permissions')) !!}
                        @foreach($permissions as $perm)
                            <?php
                                $per_found = null;

                                if( isset($role) ) {
                                    $per_found = $role->hasPermissionTo($perm->name);
                                }

                                if( isset($user)) {
                                    $per_found = $user->hasDirectPermission($perm->name);
                                }
                            ?>
                            @if($per_found)
                                <div class="checkbox">
                                    <label class="{{ str_contains($perm->name, 'delete') ? 'text-danger' : '' }}">
                                        {!! Form::checkbox("permissions[]", $perm->name, $per_found, ['disabled']) !!} {{ $perm->name }}
                                    </label>
                                </div>
                            @endif
                        @endforeach
                        <small id="permissionsHelp" class="form-text text-muted">{{ __('auth.tip.permissions') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection
