<?php

namespace Database\Factories;

use App\Models\ForecastModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ForecastModel>
 */
class ForecastFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'temperature' => fake()->randomFloat(1, -50, 50),
            'date' => fake()->dateTimeInInterval('now', '+1 day')->format('Y-m-d'),
        ];
    }
}
