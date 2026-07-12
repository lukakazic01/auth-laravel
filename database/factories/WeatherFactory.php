<?php

namespace Database\Factories;

use App\Models\WeatherModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WeatherModel>
 */
class WeatherFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'temperature' => $this->faker->randomFloat(1, -50, 50),
            'condition' => fake()->randomElement(['Cloudy', 'Partly cloudy', 'Sunny', 'Rainy', 'Stormy']),
            'chance_to_rain' => fake()->numberBetween(0, 100),
            'humidity' => fake()->numberBetween(0, 100),
            'wind_speed' => fake()->numberBetween(1, 100),
            'created_at' => now(),
        ];
    }
}
