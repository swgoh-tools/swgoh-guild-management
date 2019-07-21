@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mb-3">
                <div class="card-header">{{ __('Contact') }}</div>

                <div class="card-body">
                    <dl>
                        <!-- <dt>{{ __('User Profile') }}</dt><dd><a href="{{ route('profile', config('swgoh.CONTACT.USER_ID')) }}">{{ config('swgoh.CONTACT.USER_NAME') }}</a></dd> -->
                        <dt>{{ __('Player Name') }}</dt><dd>{{ config('swgoh.CONTACT.PLAYER_NAME') }}</dd>
                        <dt>{{ __('Guild Name') }}</dt><dd>{{ config('swgoh.CONTACT.GUILD_NAME') }}</dd>
                        <dt>{{ __('swgoh.gg') }}</dt><dd><a href="{{ config('swgoh.CONTACT.SWGOH_GG_URL') }}">{{ config('swgoh.CONTACT.SWGOH_GG_NAME') }}</a></dd>
                        <dt>{{ __('Discord') }}</dt><dd>{{ config('swgoh.CONTACT.DISCORD') }}</dd>
                        <dt>{{ __('Line') }}</dt><dd>{{ config('swgoh.CONTACT.LINE') }}</dd>
                        <dt>{{ __('EA Forum') }}</dt><dd><a href="{{ config('swgoh.CONTACT.EA_FORUM_URL') }}">{{ config('swgoh.CONTACT.EA_FORUM_NAME') }}</a></dd>
                    </dl>
                </div>
            </div>
        </div>
        @if(config('swgoh.CONTACT.DISCORD_WIDGET_URL'))
        <div class="col-md-5">
            <div class="card mb-3">
                <div class="card-header">{{ __('Chat') }}</div>

                <div class="card-body">
                    <iframe src="{{ config('swgoh.CONTACT.DISCORD_WIDGET_URL') }}" width="100%" height="300" allowtransparency="true" frameborder="0"></iframe>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
