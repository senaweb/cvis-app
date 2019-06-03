<?php

use Faker\Generator as Faker;

$factory->define(App\ModelHasPermission::class, function (Faker $faker) {
    return [
        // 'permission_id' => 2,
        'permission_id' => $faker->randomElement([1, 2]),
        'model_type' => 'App\User',
        'model_id' => ''
    ];
});
