<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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

    public function search(Request $request) {
        $search = $request->query('search');
        Artisan::call('weather:get-real', [ 'city' => $search ]);
        $output = Artisan::output();
        dd($output);
        $cities = CityModel::query()->whereLike('name', "%$search%")->with('todaysForecast')->get();
        if ($cities->isEmpty()) {
            return redirect()->route('home')->with(['message' => "There is no town '$search' matching our records, try with different value"]);
        }
        if (auth()->check()) {
            $cities = auth()->user()->withCityFavorites($cities);
        }
       return view('forecast.search', compact('cities'));
    }
}
