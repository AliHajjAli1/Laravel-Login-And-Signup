<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the admin role and permission
        $adminRole = Role::create(['name' => 'admin']);
        $deletePermission = Permission::create(['name' => 'delete users']);
        $adminRole->givePermissionTo($deletePermission);

        // Define admin user credentials
        $adminEmail = "alihjali2004@gmail.com";
        $adminPassword = "AliHaj254";

        $user = User::where('email', $adminEmail)->first();

        if (!$user) {
            $user = User::create([
                'name' => 'Admin User',
                'email' => $adminEmail,
                'password' => Hash::make($adminPassword),
            ]);
        }

        if ($user) {
            $user->assignRole('admin');
        } else {
            Log::error("User with email $adminEmail could not be created or found.");
        }
    }
}
