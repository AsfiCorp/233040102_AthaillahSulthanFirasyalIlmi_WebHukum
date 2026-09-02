<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advocate>
 */
class AdvocateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'role' => $this->faker->randomElement(['Senior Partner', 'Partner', 'Associate', 'Paralegal']),
            'short_story' => $this->faker->paragraph(3),
            'image_path' => null,
        ];
    }
}
