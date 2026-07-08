<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
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
        WeatherModel::query()->create([
            'city' => $request->city,
            'temperature' => $request->temperature,
            'condition' => $request->condition,
            'chance_to_rain' => $request->chanceToRain,
            'humidity' => $request->humidity,
            'wind_speed' => $request->windSpeed,
        ]);
        return redirect()->route('admin.dashboard')->with(['success' => 'You have successfully created a weather station.']);
    }

    public function show(string $id)
    {
        //
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
