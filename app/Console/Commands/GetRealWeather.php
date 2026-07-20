<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

#[Signature('weather:get-real {city}')]
#[Description('Command description')]
class GetRealWeather extends Command
{
    /**
     * Execute the console command.
     * @throws ConnectionException
     */
    public function handle(): void
    {
        $city = $this->argument('city');
        $response = Http::withOptions(['verify' => false])->get(env('WEATHER_API_URL')."/v1/forecast.json", [
            "key" => env('WEATHER_API_KEY'),
            "q" => $city,
            "days" => 5,
            "lang" => "en"
        ]);
        if ($response->successful()) {
            $this->getOutput()->success("Weather data retrieved for $city!");
            dd($response->json());
        } else {
            $errorMessage = $response->json()["error"]["message"];
            $statusCode = $response->status();
            $reason = $response->reason();
            $this->getOutput()->error("There was an error :( \nStatus: $statusCode $reason \nMessage: $errorMessage");
        }
    }
}
