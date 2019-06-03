<?php

use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $driver = factory(App\Driver::class, 50)->create();

        factory(App\Vehicle::class, 150)->create()
            ->each(function ($vehicle) use ($driver) {
                factory(App\Incident::class, 1)->create(['vehicle_id' => $vehicle->id, 'driver_id' => $driver->random()->id]);
            });
    }
}
