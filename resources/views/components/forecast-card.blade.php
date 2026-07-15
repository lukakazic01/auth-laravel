<section class="bg-mauve-100 dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-5">
    <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 flex items-center justify-between">
        {{ $city->name }}
        <span class="text-xs font-normal text-gray-400 dark:text-gray-500">
            {{ count($city->forecasts) }} {{ count($city->forecasts) > 1 ? 'entries' : 'entry' }}
        </span>
    </h2>
    <ul class="space-y-2">
        @foreach($city->forecasts as $forecast)
            <li class="flex flex-col rounded-lg bg-mauve-300 dark:bg-gray-700/60 px-3 py-2">
                <p class="flex justify-between items-center">
                    <img width="30" height="30" alt="{{ $forecast->weather_type }}" src="{{ config("constants.weatherTypes.$forecast->weather_type") }}" />
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $forecast->weather_type }}</span>
                </p>
                <p class="flex justify-between items-center">
                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $forecast->date->format('Y/m/d') }}
                    </span>
                    <span @class([
                        'text-base font-medium',
                        'text-blue-400 dark:text-blue-400' => $forecast->temperature < 1,
                        'text-blue-700 dark:text-blue-700' => $forecast->temperature >= 1 && $forecast->temperature < 15,
                        'text-green-500 dark:text-green-500' => $forecast->temperature >= 15 && $forecast->temperature <= 25,
                        'text-red-500 dark:text-red-500' => $forecast->temperature > 25,
                    ])>
                        {{ $forecast->temperature }}°C
                    </span>
                </p>
            </li>
        @endforeach
    </ul>
</section>
