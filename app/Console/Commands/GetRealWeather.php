<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

#[Signature('weather:get-real')]
#[Description('Command description')]
class GetRealWeather extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://api.weatherapi.com/v1/current.json?key=cee71b1b0f08435abfc112252222601&q=London&aqi=no');
        dd($response->json());
    }
}
