<?php

namespace App\View\Components;

use App\Models\WeatherModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class WeatherTable extends Component
{
    /**
     * @param Collection<int, WeatherModel> $cities
     */
    public function __construct(
        public Collection $cities
    )
    {
        //
    }

    public function isAdmin(): bool
    {
        return auth()->check() && auth()->user()->role == 'admin';
    }

    public function render(): View|Closure|string
    {
        return view('components.weather-table');
    }
}
