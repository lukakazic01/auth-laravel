<?php

namespace Database\Seeders;

use App\Models\CityModel;
use App\Models\ForecastModel;
use Illuminate\Database\Seeder;

class ForecastSeeder extends Seeder
{

    public function run(): void
    {
        $cities = CityModel::all();
        foreach($cities as $city) {
            for($i = 0; $i < 5; $i++) {
                $forecast = ForecastModel::factory()->make([
                    'city_id' => $city->id,
                    'date' => now()->addDays($i + 1)->format('Y-m-d'),
                ]);
                $range = config("constants.temperatureRangesByWeatherType.$forecast->weather_type") ?? null;
                if ($range) {
                    $forecast->temperature = fake()->randomFloat(1, $range[0], $range[1]);
                }
                if ($forecast->weather_type === 'Sunny') {
                    $forecast->probability = null;
                }
                $forecast->save();
            }
        }
    }
}
