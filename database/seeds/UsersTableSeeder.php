<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'role_id' => 1,
            'first_name' => 'Elvis',
            'last_name' => 'Adjei',
            'organization_id' => 'px4165',
            'organization_unit' => 'Police Officer',
            'phone' => '0266266828',
            'email' => 'nana.elvee@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password')
        ]);

        \App\ModelHasRole::insert([
            'role_id' => 1,
            'model_type' => 'App\User',
            'model_id' => 1
        ]);

        \App\ModelHasPermission::insert([
            'permission_id' => 1,
            'model_type' => 'App\User',
            'model_id' => 1
        ]);

        $users = factory(App\User::class, 19)->create();

        $users->each(function ($user) {
            factory(App\ModelHasRole::class)->create(['model_id' => $user->id]);
        });

        $users->each(function ($user) {
            factory(App\ModelHasPermission::class)->create(['model_id' => $user->id]);
        });
    }
}
