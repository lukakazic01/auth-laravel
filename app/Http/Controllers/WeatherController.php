<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use App\Models\CityModel;
use App\Models\WeatherModel;

class WeatherController extends Controller
{

    public function index()
    {
        $cities = WeatherModel::query()->with('city')->get();
        return view('admin.index', compact('cities'));
    }

    public function store(WeatherRequest $request)
    {
        $city = CityModel::query()->create([
            'name' => $request->city,
        ]);

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
        return view('admin.create-weather');
    }

    public function edit(string $cityId)
    {
        $city = WeatherModel::query()->with('city')->where('city_id', $cityId)->firstOrFail();
        return view('admin.edit-weather', compact('city'));
    }

    public function update(WeatherRequest $request, string $cityId)
    {
        $city = CityModel::query()->findOrFail($cityId);
        $city->update([
            'name' => $request->city,
        ]);

        WeatherModel::query()->where('city_id', $cityId)->update([
            'temperature' => $request->temperature,
            'condition' => $request->condition,
            'chance_to_rain' => $request->chanceToRain,
            'humidity' => $request->humidity,
            'wind_speed' => $request->windSpeed,
        ]);
        return redirect()->route('admin.dashboard')->with(['success' => "You successfully updated the city $city->name!"]);
    }

    public function destroy(string $id)
    {
        //
    }
}
