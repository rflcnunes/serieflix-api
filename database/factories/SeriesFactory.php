<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Series>
 */
class SeriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'series_code' => $this->faker->unique()->numberBetween(200,300),
            'series_name' => $this->faker->jobTitle(),
            'series_seasons' => $this->faker->numberBetween(10,30),
            'series_episodes' => $this->faker->numberBetween(10,50)
        ];
    }
}
