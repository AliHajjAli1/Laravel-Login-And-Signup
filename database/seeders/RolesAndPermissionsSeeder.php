<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $deletePermission = Permission::create(['name' => 'delete users']);
        $adminRole->givePermissionTo($deletePermission);
        $adminEmail = "alihjali2004@gmail.com";
        $user = User::where('email', $adminEmail)->first();

        if ($user) {
            $user->assignRole('admin');
        } else {
            \Log::error("User with email $adminEmail not found.");
        }
    }
}
