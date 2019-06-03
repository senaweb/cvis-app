<?php

use App\User;
use Illuminate\Support\Str;
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


$factory->define(User::class, function (Faker $faker) {
    $companyPrefix = $faker->randomElement(['uni', 'sony', 'px', 'pz']);
    $randomNumber = $faker->numberBetween($min = 1000, $max = 9000);
    return [
        'role_id' => 2,
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName,
        'organization_id' => $faker->randomElement([
            null,  $companyPrefix . $randomNumber, $companyPrefix . $randomNumber,
        ]),
        'organization_unit' => $faker->randomElement(['Police Officer', 'Insurance Campany', 'Health Center']),
        'phone' => $faker->randomElement(['0245', '0244', '0205']) .  $faker->numberBetween($min = 100000, $max = 900000),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
