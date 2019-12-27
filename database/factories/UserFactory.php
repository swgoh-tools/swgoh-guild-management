<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        //'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        //'confirmed' => true
    ];
});


$factory->state(App\User::class, 'unconfirmed', function () {
    return [
        'confirmed' => false
    ];
});

$factory->state(App\User::class, 'administrator', function () {
    return [
        'name' => 'JohnDoe'
    ];
});


