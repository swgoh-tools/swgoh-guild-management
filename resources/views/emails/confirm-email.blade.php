@component('mail::message')
# {{ __('One Last Step') }}

{{ __('app.you_registered_on', ['url' => url()]) }}
{{ __('We just need you to confirm your email address to prove that you\'re a human.') }}

@component('mail::button', ['url' => url('/register/confirm?token=' . $user->confirmation_token)])
{{ __('Confirm Email') }}
@endcomponent

{{ __('Thanks and welcome!') }}<br>
{{ config('app.name') }}
@endcomponent
