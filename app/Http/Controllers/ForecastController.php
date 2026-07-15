<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use App\Models\ForecastModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ForecastController extends Controller
{

    public function index() {
        $cities = CityModel::query()->with('forecasts')->get();
        return view('forecast.index', compact('cities'));
    }

    public function show(string $cityName)
    {
        $city = CityModel::query()
            ->with(['weather', 'forecasts'])
            ->where(['name' => mb_convert_case($cityName, MB_CASE_TITLE)])
            ->firstOrFail();
        return view('forecast.city', compact('city'));
    }
}
