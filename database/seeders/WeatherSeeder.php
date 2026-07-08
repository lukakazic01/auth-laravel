<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{

    public function run(): void
    {
        $total = 5;
        $chunkSize = 1;
        $this->command->getOutput()->progressStart($total);
        for ($i = 0; $i < $total; $i += $chunkSize) {
            WeatherModel::factory()->count($chunkSize)->create();
            $this->command->getOutput()->progressAdvance($chunkSize);
        }
        $this->command->getOutput()->progressFinish();
    }
}
