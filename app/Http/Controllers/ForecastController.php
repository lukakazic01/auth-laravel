<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use App\Models\ForecastModel;
use Illuminate\Http\Request;

class ForecastController extends Controller
{

    public function index() {
        $forecasts = ForecastModel::query()->with('city')->get();
        $groupedByName = $forecasts->groupBy('city.name');
        return view('admin.forecast.index', ['forecasts' => $groupedByName]);
    }

    public function show(string $cityName)
    {
        $city = CityModel::query()
            ->with(['weather', 'forecasts'])
            ->where(['name' => mb_convert_case($cityName, MB_CASE_TITLE)])
            ->firstOrFail();
        return view('forecast.city', compact('city'));
    }

    public function create () {
        return view('admin.forecast.create');
    }
}
