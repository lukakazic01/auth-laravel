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

    public static function temperatureColor($temperature): string {
        return match(true) {
            $temperature < 1 => 'text-blue-800 dark:text-blue-800',
            $temperature >= 1 && $temperature < 15 => 'text-blue-500 dark:text-blue-500',
            $temperature >= 15 && $temperature <= 25 => 'text-green-500 dark:text-green-500',
            $temperature > 25 => 'text-red-500 dark:text-red-500',
        };
    }
}
