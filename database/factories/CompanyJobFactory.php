<?php

namespace Database\Factories;

use App\Models\CompanyJob;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyJob>
 */
class CompanyJobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => $this->faker->numberBetween(1, 10),
            'position' => $this->faker->jobTitle,
            'location' => $this->faker->city,
            'salary' => $this->faker->numberBetween(50000, 150000),
            'description' => $this->faker->paragraph,
            'preferred_skills' => $this->faker->words(3, true),
            'mandatory_skills' => $this->faker->words(3, true),
            'job_type' => $this->faker->randomElement(['full-time', 'part-time']),
            'type' => $this->faker->randomElement(['remote', 'onsite', 'hybrid']),
        ];
    }
}
