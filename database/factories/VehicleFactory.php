<?php

use Faker\Generator as Faker;

$factory->define(\App\Vehicle::class, function (Faker $faker) {
    return [
        'vehicle_id_number' => $faker->bankAccountNumber,
        'registration_number' => $faker->randomElement(['GN', 'GS', 'GW', 'AS', 'GE', 'GT', 'CR', 'GR']) . ' ' .
            $faker->numberBetween(1, 99999) . ' ' .
            $faker->randomElement([ucfirst($faker->randomLetter), ' - ' . $faker->numberBetween(10, 19)]),
        'make' => $faker->randomElement(['Toyota', 'Ford', 'Nissan', 'BMW', 'Mazda', 'Mercedes-Benz', 'Volkswagen', 'Audi', 'Kia', 'Hyundai', 'Honda', 'Dodge', 'Volvo', 'Jaquar', 'Infiniti', 'Chevrolet', 'Suzuki']),
        'model' => $faker->randomElement(['595', '208', 'C3', 'C4 SpaceTourer', 'Galaxy', 'Rio', 'Focus', 'Civic', 'Tucson', 'C-Class', 'Traveller', '508', 'Swift', 'Caddy', 'Grand Scenic', 'Vivid'])
    ];
});
