<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use App\Models\ForecastModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminForecastController extends Controller
{
    public function index() {
        $cities = CityModel::query()->with('forecasts')->get();
        return view('admin.forecast.index', compact('cities'));
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
            'probability' => 'sometimes|integer|between:0,100',
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
        return redirect()->route('admin.forecasts')->with(['success' => "Successfully created forecast for city $city->name"]);
    }

    public function destroy (Request $request, ForecastModel $forecast) {
        $forecast->delete();
        return redirect()->route('admin.forecasts')->with(['success' => "Successfully deleted forecast"]);
    }
}
