<?php

namespace Database\Seeders;

use App\Models\CityModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        CityModel::factory()->count(100)->create();
    }
}
