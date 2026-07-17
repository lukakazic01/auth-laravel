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
        $apiKey = env('WEATHER_API_KEY');
        $cityName = $this->ask('Of which city weather are you interested in?');
        if (empty($cityName)) {
            $this->getOutput()->error('City name is empty');
            return;
        }
        $response = Http::get("https://api.weatherapi.com/v1/current.json?key=$apiKey&q=$cityName");
        if ($response->successful()) {
            $this->getOutput()->success("Weather data retrieved for $cityName!");
            dd($response->json());
        } else {
            $errorMessage = $response->json()["error"]["message"];
            $statusCode = $response->status();
            $reason = $response->reason();
            $this->getOutput()->error("There was an error :( \nStatus: $statusCode $reason \nMessage: $errorMessage");
        }
    }
}
