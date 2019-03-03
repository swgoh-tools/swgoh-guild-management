<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'not-confirmed' => 'Your email address is not confirmed. Some features like automatic guild creation are disabled.',
    'no-allycode' => 'You did not provide your ally code. Some features like guild matching won\'t work.',
    'tip' => [
        'email' => 'We\'ll never share your email with anyone else.',
        'code' => 'Your ingame ally code. Format either 000-000-000 or 000000000. Used to sync your guild\'s data and to set your guild as default page.',
        'name' => 'You are free to choose any name but it makes sense to use your ingame name here.',
        'password-change' => 'Only fill out if you want to change your password. Leave empty otherwise.',
        'roles' => 'Roles for additional access. Assignment restricted to admins.',
        'permissions' => 'Additional direct permissions. Assignment restricted to admins.',
        'guild-missing' => 'Guild not found. Check with admins.',
    ],

];
