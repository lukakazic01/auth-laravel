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
            $this->command->getOutput()->error('Total should be of type number');
            return;
        }
        $cityName = trim($this->command->ask('What should be the name of the city?'));
        if ($cityName === '') {
            $this->command->getOutput()->error('City name is missing');
            return;
        }
        $temperature = $this->command->ask('What would be the temperature in that city?');
        if (!isset($temperature) || !is_numeric($temperature) || !str_contains($temperature, '.')) {
            $this->command->getOutput()->error('Temperature is missing or is invalid format');
            return;
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
        $this->command->getOutput()->success('Created models successfully');
    }
}
