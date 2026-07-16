<?php

namespace Database\Seeders;

use App\Helpers\MathHelper;
use App\Models\CityModel;
use App\Models\ForecastModel;
use Illuminate\Database\Seeder;

class ForecastSeeder extends Seeder
{

    public function run(): void
    {
        $cities = CityModel::all();
        $lastTemperature = null;
        foreach($cities as $city) {
            for($i = 0; $i < 30; $i++) {
                $forecast = ForecastModel::factory()->make([
                    'city_id' => $city->id,
                    'date' => now()->addDays($i + 1)->format('Y-m-d'),
                ]);
                if ($lastTemperature === null) {
                    $range = config("constants.temperatureRangesByWeatherType.$forecast->weather_type") ?? null;
                    if ($range) {
                        $generatedTemperature = MathHelper::randomFloatBetween($range[0], $range[1], 1);
                        $forecast->temperature = $generatedTemperature;
                        $lastTemperature = $generatedTemperature;
                    }
                } else {
                    $min = $lastTemperature <= -45 && $lastTemperature >= -50 ? -45 : $lastTemperature - 5;
                    $max = $lastTemperature >= 45 && $lastTemperature <= 50 ? 45 : $lastTemperature + 5;
                    $lastTemperature = MathHelper::randomFloatBetween($min, $max, 1);
                    $forecast->temperature = $lastTemperature;
                }
                if ($forecast->weather_type === 'Sunny') {
                    $forecast->probability = null;
                }
                $forecast->save();
            }
        }
    }
}
