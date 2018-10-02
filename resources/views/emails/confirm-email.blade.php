@component('mail::message')
# Fast geschafft

Du hast Dich auf der Seite {{ config('app.name') }} registriert. Bitte bestätige Deine E-Mail-Adresse.

@component('mail::button', ['url' => url('/register/confirm?token=' . $user->confirmation_token)])
E-Mail bestätigen
@endcomponent

Danke und herzlich willkommen!<br>
{{ config('app.name') }}

##################################################################################################

# One Last Step

We just need you to confirm your email address to prove that you're a human.

@component('mail::button', ['url' => url('/register/confirm?token=' . $user->confirmation_token)])
Confirm Email
@endcomponent

Thanks and welcome!<br>
{{ config('app.name') }}
@endcomponent
