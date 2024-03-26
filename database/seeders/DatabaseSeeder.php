<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\CorporateCardApplication;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
            'password' => bcrypt('123123123'),
        ]);

        $user1->assignRole('registered');

        $user2 = User::factory()->create([
            'email' => 'manager@mail.com',
            'password' => bcrypt('123123123'),
        ]);

        $user2->assignRole('manager');

        $user3 = User::factory()->create([
            'email' => 'financial_manager@mail.com',
            'password' => bcrypt('123123123'),
        ]);

        $user3->assignRole('financial_manager');

        $user4 = User::factory()->create([
            'email' => 'bqudamith@gmail.com',
            'password' => bcrypt('123123123'),
        ]);

        $user4->assignRole('manager');

        $cardApplications = CorporateCardApplication::factory()->count(100)->create();
    }
}
