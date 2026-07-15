<?php
return [
    'weatherTypes' => [
        'Cloudy' => 'https://cdn.meteocons.com/3.0.0-next.10/svg/fill/cloudy.svg',
        'Partly cloudy' => 'https://cdn.meteocons.com/3.0.0-next.10/svg/fill/mostly-clear-day.svg',
        'Sunny' => 'https://cdn.meteocons.com/3.0.0-next.10/svg/fill/clear-day.svg',
        'Rainy' => 'https://cdn.meteocons.com/3.0.0-next.10/svg/fill/rain.svg',
        'Stormy' => 'https://cdn.meteocons.com/3.0.0-next.10/svg/fill/thunderstorms.svg',
        'Snowy' => 'https://cdn.meteocons.com/3.0.0-next.10/svg/fill/snow.svg',
        'Sleet' => 'https://cdn.meteocons.com/3.0.0-next.10/svg/fill/sleet.svg'
    ],
    'temperatureRangesByWeatherType' => [
        'Cloudy' => [-50, 15],
        'Partly cloudy' => [-50, 25],
        'Rainy' => [-10, 50],
        'Snowy' => [-50, 1],
        'Stormy' => [-50, 25],
        'Sleet' => [-2, 3],
    ],
];
