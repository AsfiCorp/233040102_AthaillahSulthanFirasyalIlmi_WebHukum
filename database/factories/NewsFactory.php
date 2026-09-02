<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    public function definition(): array
    {
        $type = $this->faker->randomElement(['internal', 'external']);

        return [
            'title' => $this->faker->sentence(6),
            'content' => $this->faker->paragraphs(4, true),
            'image_path' => null,
            'type' => $type,
            'external_url' => $type === 'external' ? $this->faker->url() : null,
            'admin_id' => User::factory(),
        ];
    }
}
