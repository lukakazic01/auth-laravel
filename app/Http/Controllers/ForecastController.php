<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use App\Models\ForecastModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ForecastController extends Controller
{

    public function index() {
        $forecasts = ForecastModel::query()->with('city')->get();
        $groupedByName = $forecasts->groupBy('city.name');
        return view('forecast.index', ['forecasts' => $groupedByName]);
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
        $cities = CityModel::all();
        return view('admin.forecast.create', compact('cities'));
    }

    public function store(Request $request) {
        $request->validate([
            'city_id' => 'required|integer|exists:cities,id',
            'temperature' => 'required|numeric|between:-50,60|decimal:1',
            'weather_type' => 'required|string|max:60',
            'probability' => 'required|integer|between:0,100',
            'date' => ['required', Rule::date()->format("Y-m-d")->afterOrEqual('today')],
        ]);
        ForecastModel::query()->create([
            'city_id' => $request->city_id,
            'temperature' => $request->temperature,
            'weather_type' => $request->weather_type,
            'probability' => $request->weahter_type === 'Sunny' ? $request->probability : null,
            'date' => $request->date,
        ]);
        $city = CityModel::query()->findOrFail($request->city_id);
        return redirect()->route('forecasts')->with(['success' => "Successfully create forecast for city $city->name"]);
    }
}
