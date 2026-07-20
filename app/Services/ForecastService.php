<?php

namespace App\Services;

use App\Models\CityModel;
use Exception;
use Illuminate\Support\Facades\Artisan;

class ForecastService
{

    /**
     * @throws Exception
     */
    public function getForecastForCity(string $city) {
        Artisan::call('weather:get-real', ['city' => $city]);
        $apiResponse = json_decode(Artisan::output(), true);
        if ($apiResponse['statusCode'] >= 400) {
            throw new Exception($apiResponse['errorMessage'] ?? 'Unable to fetch weather data');
        }
        return $apiResponse;
    }

    public function createForecastsForCity(CityModel|null $city, array $forecasts): void
    {
        $city->forecasts()->createMany($this->mapForecasts($forecasts));
    }

    private function mapForecasts(array $forecasts): array {
        return array_map(function ($forecast)  {
            return [
                "temperature" => $forecast["day"]["avgtemp_c"],
                "date" => $forecast["date"],
                "weather_type" => $forecast["day"]["condition"]["text"],
                "probability" => $forecast["day"]["daily_chance_of_rain"],
            ];
        }, $forecasts);
    }
}
