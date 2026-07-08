<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{

    /**
     * @throws \Exception
     */
    public function run(): void
    {
        $total = $this->command->ask('How many cities would you like to create?', 1);
        $chunkSize = $this->command->ask('How much cities would you like to create per iteration?', 1);
        $cityName = $this->command->ask('What should be the name of the city?');
        if (!isset($cityName)) {
            throw new \Exception('City name is missing');
        }
        $temperature = $this->command->ask('What would be the temperature in that city?');
        if (!isset($temperature)) {
            throw new \Exception('Temperature is missing');
        }
        $this->command->getOutput()->progressStart($total);
        for ($i = 0; $i < $total; $i += $chunkSize) {
            WeatherModel::factory()->count($chunkSize)->create();
            $this->command->getOutput()->progressAdvance($chunkSize);
        }
        $this->command->getOutput()->progressFinish();
    }
}
