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
    $WEATHERS = array_keys(config('constants.weatherTypes'));
        return [
            'temperature' => fake()->randomFloat(1, -50, 50),
            'date' => fake()->dateTimeInInterval('now', '+30 days')->format('Y-m-d'),
            'weather_type' => fake()->randomElement($WEATHERS),
            'probability' => fake()->numberBetween(1, 100),
        ];
    }
}
