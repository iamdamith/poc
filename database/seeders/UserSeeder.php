<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Create User Roles

        $registered_user = Role::create(['name' => 'registered']);
        $manager = Role::create(['name' => 'manager']);
        $financial_manager = Role::create(['name' => 'financial_manager']);

        // Create Permissions

        Permission::create(['name' => 'create-credit-card-application']);
        Permission::create(['name' => 'show-credit-card-application']);
        Permission::create(['name' => 'update-credit-card-application']);
        Permission::create(['name' => 'delete-credit-card-application']);
        Permission::create(['name' => 'approve-credit-card-application']);
        Permission::create(['name' => 'finance-approve-credit-card-application']);

        $registered_user->syncPermissions(['create-credit-card-application']);

        $manager->syncPermissions([
            'approve-credit-card-application',
            'show-credit-card-application',
            'update-credit-card-application',
            'delete-credit-card-application',
        ]);

        $financial_manager->syncPermissions([
            'finance-approve-credit-card-application',
        ]);

        $user1 = User::factory()->create([
            'email' => 'registered_user@mail.com',
            'password' => '123123123',
        ]);

        $user1->assignRole('registered');

        $user2 = User::factory()->create([
            'email' => 'manager@mail.com',
            'password' => '123123123',
        ]);

        $user2->assignRole('manager');

        $user3 = User::factory()->create([
            'email' => 'financial_manager@mail.com',
            'password' => '123123123',
        ]);

        $user3->assignRole('financial_manager');

    }
}
