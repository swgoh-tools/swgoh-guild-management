@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @auth
                        <div class="alert alert-success" role="alert">
                            {{ __('You are currently logged in.') }}
                        </div>
                    @else
                        <div class="alert alert-info" role="alert">
                            {{ __('You are currently viewing this website as guest.') }}
                        </div>
                    @endauth
                    <p>{{ __('app.introduction.guilds') }}</p>
                    <p>{{ __('app.introduction.pages') }}</p>
                    <p>{{ __('app.introduction.guilds-test') }}</p>
                    <p>{{ __('app.introduction.threads') }}</p>
                    <p>{{ __('app.introduction.tools') }}</p>
                    <p>{{ __('May the force be with you.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
