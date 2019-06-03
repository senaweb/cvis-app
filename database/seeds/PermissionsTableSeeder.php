<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create([
            'name' => 'super admin',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'register users',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'create incidents',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'edit incidents',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'view incidents',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'delete incidents',
            'guard_name' => 'web'
        ]);
    }
}
