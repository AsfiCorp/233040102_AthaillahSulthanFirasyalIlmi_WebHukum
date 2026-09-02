<?php

namespace Database\Factories;

use App\Models\Advocate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Advocate>
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
