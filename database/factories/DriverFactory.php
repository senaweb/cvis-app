<?php

use Faker\Generator as Faker;

$factory->define(\App\Driver::class, function (Faker $faker) {
    return [
        'licence_id_number' => $faker->ssn,
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName,
        'gender' => $faker->randomElement(['male', 'female']),
        'dob' => $faker->date,
        'phone' => $faker->randomElement(['0245', '0244', '0205']) .  $faker->numberBetween($min = 100000, $max = 900000),
        'residential_address' => $faker->address
    ];
});
