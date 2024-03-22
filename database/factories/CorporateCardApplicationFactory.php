<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\UserRole;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CorporateCardApplication>
 */
class CorporateCardApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'applicant_name' => fake()->name(),
            'position' => fake()->jobTitle(),
            'phone_work' => fake()->phoneNumber(),
            'phone_work_mobile' => fake()->phoneNumber(),
            'manager_id' => User::factory()->create()->id,
            'property_n_procurement_manager_id' => User::factory()->create()->id,
            'justification' => fake()->text(),
            'licence' => fake()->text(),
            'created_by' => User::factory()->create()->id,
            'created_at' => fake()->unique()->dateTimeBetween('-12 week', '-1 day')
        ];
    }
}
