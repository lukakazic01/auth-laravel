<?php

namespace App\View\Components;

use App\Models\CityModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FavoriteCityCard extends Component
{

    public function __construct(
        public CityModel $city,
    )
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.favorite-city-card');
    }
}
