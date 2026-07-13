<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function show(string $cityName)
    {
        $city = CityModel::query()
            ->with(['weather', 'forecasts'])
            ->where(['name' => mb_convert_case($cityName, MB_CASE_TITLE)])
            ->firstOrFail();
        return view('forecast.city', compact('city'));
    }
}
