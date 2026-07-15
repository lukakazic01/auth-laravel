<?php

namespace App\View\Components;

use App\Models\CityModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ForecastCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public CityModel $city,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forecast-card');
    }
}
