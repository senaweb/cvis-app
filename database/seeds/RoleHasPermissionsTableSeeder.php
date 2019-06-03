<?php

use App\RoleHasPermission;
use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(RoleHasPermission $roleHasPermissions)
    {
        $roleHasPermissions->insert([
            'permission_id' => 1,
            'role_id' => 1
        ]);

        $roleHasPermissions->insert([
            'permission_id' => 2,
            'role_id' => 2
        ]);

        $roleHasPermissions->insert([
            'permission_id' => 3,
            'role_id' => 2
        ]);

        $roleHasPermissions->insert([
            'permission_id' => 4,
            'role_id' => 2
        ]);

        $roleHasPermissions->insert([
            'permission_id' => 5,
            'role_id' => 2
        ]);
    }
}
