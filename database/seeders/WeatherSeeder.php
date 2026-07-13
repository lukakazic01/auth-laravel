<?php

namespace Database\Seeders;

use App\Models\CityModel;
use App\Models\WeatherModel;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{

    public function run(): void
    {
        $weathers = WeatherModel::all();
        $allCityIds = CityModel::all()->pluck('id');
        if ($weathers->isNotEmpty()) {
            for($i = 0; $i < count($weathers); $i++) {
                $weathers[$i]->update([
                    'city_id' => $allCityIds[$i],
                ]);
            }
        } else {
            foreach($allCityIds as $cityId) {
                WeatherModel::factory()->create([
                    'city_id' => $cityId,
                ]);
            }
        }
    }
}
