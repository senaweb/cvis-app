<?php

use Faker\Generator as Faker;

$factory->define(\App\ModelHasRole::class, function (Faker $faker) {
    return [
        'role_id' => $faker->randomElement([1, 2]),
        'model_type' => 'App\User',
        'model_id' => ''
    ];
});
