<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use App\Models\UserCitiesModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserCitiesController extends Controller
{

    public function favorite(Request $request, CityModel $city) {
        if (!auth()->check()) {
            return redirect()->back()->with(['error' => 'You must be logged in to put city and its forecast into favorites']);
        }
        $isAlreadyInFavorites = UserCitiesModel::query()->where(['user_id' => auth()->id(), 'city_id' => $city->id])->first();
        if ($isAlreadyInFavorites) {
            $isAlreadyInFavorites->delete();
        } else {
            UserCitiesModel::query()->create([
                "city_id" => $city->id,
                "user_id" => auth()->id()
            ]);
        }
        $action = $isAlreadyInFavorites ? 'unfavorited' : 'favorited';
        return redirect()->back()->with(['success' => "You have successfully $action $city->name"]);
    }
}
