<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required|string|max:255|',
            'temperature' => 'required|decimal:1|max:200',
            'condition' => 'required|string|max:60',
            'chanceToRain' => 'required|integer|min:1|max:100',
            'humidity' => 'required|integer|min:1|max:100',
            'windSpeed' => 'required|integer|min:1|max:500',
        ]);
        WeatherModel::query()->create([
            'city' => $request->city,
            'temperature' => $request->temperature,
            'condition' => $request->condition,
            'chance_to_rain' => $request->chanceToRain,
            'humidity' => $request->humidity,
            'wind_speed' => $request->windSpeed,
        ]);
        return redirect()->route('admin.dashboard');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(WeatherModel $city)
    {
        return view('admin.edit-city', compact('city'));
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
