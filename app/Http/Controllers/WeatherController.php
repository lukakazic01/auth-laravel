<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use App\Models\CityModel;
use App\Models\WeatherModel;
use Illuminate\Http\Request;

class WeatherController extends Controller
{

    public function index()
    {
        $cities = WeatherModel::all();
        return view('admin.index', compact('cities'));
    }

    public function create()
    {
        return view('admin.create-city');
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

    public function show(string $cityName)
    {
        $city = WeatherModel::query()->where(['city' => mb_convert_case($cityName, MB_CASE_TITLE)])->firstOrFail();
        $city['temperature_in_next_5_days'] = [20, 30, 40, 50, 60];
        return view('forecast.city', compact('city'));
    }

    public function edit(WeatherModel $city)
    {
        return view('admin.edit-city', compact('city'));
    }

    public function update(WeatherRequest $request, WeatherModel $city)
    {
        $city->update([
            'city' => $request->city,
            'temperature' => $request->temperature,
            'condition' => $request->condition,
            'chance_to_rain' => $request->chanceToRain,
            'humidity' => $request->humidity,
            'wind_speed' => $request->windSpeed,
        ]);
        return redirect()->route('admin.dashboard')->with(['success' => "You successfully updated the city $city->city!"]);
    }

    public function destroy(string $id)
    {
        //
    }
}
