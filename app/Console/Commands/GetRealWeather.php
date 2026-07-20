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
            "days" => 3, // Free tier max 3 days ahead
            "lang" => "en",
            "aqi" => "no"
        ]);
        if ($response->successful()) {
            dd($response->json());
        } else {
            $errorMessage = $response->json()["error"]["message"];
            $statusCode = $response->status();
            $reason = $response->reason();
            dd(compact('errorMessage', 'statusCode', 'reason'));
        }
    }
}
