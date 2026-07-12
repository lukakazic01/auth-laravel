<?php

namespace Database\Factories;

use App\Models\CityModel;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CityModel>
 */
class CityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->city(),
        ];
    }
}
