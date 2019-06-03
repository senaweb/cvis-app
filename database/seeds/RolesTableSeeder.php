<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'super admin',
            'slug' => 'super-admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'admin',
            'slug' => 'admin',
            'guard_name' => 'web'
        ]);
    }
}
