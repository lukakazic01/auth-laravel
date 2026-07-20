<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use App\Services\ForecastService;
use Exception;
use Illuminate\Http\Request;

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

    public function search(Request $request, ForecastService $forecastService) {
        $search = mb_convert_case($request->query('search'), MB_CASE_TITLE);

        $city = CityModel::query()->where(['name' => $search])->first();
        if (!$city?->todaysForecast) {
            try {
                $apiResponse = $forecastService->getForecastForCity($search);
            } catch (Exception $e) {
                return redirect()->route('home')->with(['message' => $e->getMessage()]);
            }
            // Because weather api can return different name than we searched for (search: NYC, weatherApi: New York)
            $city = CityModel::query()->firstOrCreate(["name" => $apiResponse["location"]["name"]]);
            $forecastService->createForecastsForCity($city, $apiResponse["forecast"]["forecastday"]);
        }

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
