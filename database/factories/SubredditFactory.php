<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Subreddit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subreddit>
 */
final class SubredditFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(),
            'display_name' => fake()->words(2, true),
            'description' => fake()->sentence(12),
            'subscriber_count' => fake()->numberBetween(0, 10000),
            'banner_url' => fake()->imageUrl(800, 200, 'cats', true),
            'icon_url' => fake()->imageUrl(50, 50, 'cats', true),
        ];
    }
}
