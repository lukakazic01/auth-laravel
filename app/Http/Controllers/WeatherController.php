<?php

namespace App\Http\Controllers;

use App\Models\WeatherModel;

class WeatherController extends Controller
{

    public function index()
    {
        $weathers = WeatherModel::query()->with('city')->get();
        return view('weather.index', compact('weathers'));
    }
}
