<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{

    public function run(): void
    {
        $total = $this->command->ask('How much cities would you like to create?', 1);
        if (!is_numeric($total)) {
            throw new \Exception('Total should be of type number');
        }
        $cityName = trim($this->command->ask('What should be the name of the city?'));
        if ($cityName === '') {
            throw new \Exception('City name is missing');
        }
        $temperature = $this->command->ask('What would be the temperature in that city?');
        if (!isset($temperature) || !is_numeric($temperature) || !str_contains($temperature, '.')) {
            throw new \Exception('Temperature is missing or is invalid format');
        }
        $this->command->getOutput()->progressStart($total);
        for ($i = 0; $i < $total; $i++) {
            WeatherModel::factory()->create([
                'city' => $cityName,
                'temperature' => $temperature,
            ]);
            $this->command->getOutput()->progressAdvance(1);
        }
        $this->command->getOutput()->progressFinish();
    }
}
