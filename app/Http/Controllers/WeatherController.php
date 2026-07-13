<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use App\Models\CityModel;
use App\Models\WeatherModel;

class WeatherController extends Controller
{

    public function index()
    {
        $weathers = WeatherModel::query()->with('city')->get();
        return view('admin.index', compact('weathers'));
    }

    public function store(WeatherRequest $request)
    {
        $city = CityModel::query()->where(['id' => $request->city_id])->firstOrFail();
        WeatherModel::query()->create([
            'city_id' => $city->id,
            'temperature' => $request->temperature,
            'condition' => $request->condition,
            'chance_to_rain' => $request->chanceToRain,
            'humidity' => $request->humidity,
            'wind_speed' => $request->windSpeed,
        ]);
        return redirect()->route('admin.dashboard')->with(['success' => 'You have successfully created a weather station.']);
    }

    public function create()
    {
        $cities = CityModel::all();
        return view('admin.create-weather', compact('cities'));
    }

    public function edit(WeatherModel $weather)
    {
        $cities = CityModel::all();
        return view('admin.edit-weather', compact('weather', 'cities'));
    }

    public function update(WeatherRequest $request, WeatherModel $weather)
    {
        $selectedCity = CityModel::query()->where(['id' => $request->city_id])->firstOrFail();
        $weather->update([
            'city_id' => $selectedCity->id,
            'temperature' => $request->temperature,
            'condition' => $request->condition,
            'chance_to_rain' => $request->chanceToRain,
            'humidity' => $request->humidity,
            'wind_speed' => $request->windSpeed,
        ]);
        return redirect()->route('admin.dashboard')->with(['success' => "You successfully updated the weather!"]);
    }

    public function destroy(string $id)
    {
        //
    }
}
