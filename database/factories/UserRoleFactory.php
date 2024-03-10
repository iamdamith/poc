<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserRole>
 */
class UserRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = $this->unique()->randomElement([
            ['Administrator', 'AdminDashboardController'],
            ['Consultant', 'ConsultantDashboardController'],
            ['Client', 'ClientDashboardController'],
            ['Tech Lead', 'TechLeadDashboardController'],
        ]);

        return [
            'name' => $role[0],
            'guard_name' => $role[0],
            'dashboard' => $role[1],
        ];
    }
}
