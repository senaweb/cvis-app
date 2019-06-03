<?php

use Faker\Generator as Faker;

$factory->define(\App\Incident::class, function (Faker $faker) {
    return [
        // 'vehicle_id' => function ($incident) {
        //     return $incident['incident_type'] == 'Theft' ? null : App\Vehicle::get()->random()->id;
        // },
        // 'driver_id' => function ($incident) {
        //     return $incident['incident_type'] == 'Theft' ? null : App\Driver::get()->random()->id;
        // },

        'vehicle_id' => App\Vehicle::get()->random()->id,
        'driver_id' => App\Driver::get()->random()->id,
        'incident_type' => $faker->randomElement(['Theft', 'Accident']),
        'date_of_incident' => \Carbon\Carbon::create($faker->year, $faker->month, $faker->dayOfMonth),
        'time_of_incident' => $faker->numberBetween(1, 12) . ':' . $faker->numberBetween(00, 59),
        'location' => $faker->address,
        'passengers' => $faker->numberBetween(1, 6),
        'casualties' => $faker->randomElement(['no', 'yes']),
        'properties_damaged' => $faker->randomElement(['no', 'yes']),
        'comment' => $faker->randomElement([null, $faker->text]),
        // 'created_at' => \Carbon\Carbon::create($faker->year, $faker->month, $faker->dayOfMonth)
        'created_at' => $faker->dateTimeBetween($startDate = '-8 years', $endDate = 'now')
    ];
});
