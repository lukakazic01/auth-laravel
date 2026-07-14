<x-layout>
    <div class="p-10 flex items-center justify-center w-full flex-col bg-gray-50 dark:bg-gray-900 min-h-screen">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Weather Forecasts</h1>
        @if(session()->has('success'))
            <div class="bg-green-100 rounded-lg mb-6 border border-green-500 text-green-500 w-full px-6 py-4 text-center">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6 w-full">
            @foreach($forecasts as $cityName => $cityForecasts)
                <section class="bg-mauve-100 dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-5">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 flex items-center justify-between">
                        {{ $cityName }}
                        <span class="text-xs font-normal text-gray-400 dark:text-gray-500">
                            {{ count($cityForecasts) }} {{ count($cityForecasts) > 1 ? 'entries' : 'entry' }}
                        </span>
                    </h2>
                    <ul class="space-y-2">
                        @foreach($cityForecasts as $forecast)
                            <li class="flex flex-col rounded-lg bg-mauve-300 dark:bg-gray-700/60 px-3 py-2">
                                <p class="flex justify-between items-center">
                                    <img width="30" height="30" alt="{{ $forecast->weather_type }}" src="{{ config("constants.weatherTypes.$forecast->weather_type") }}" />
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $forecast->weather_type }}</span>
                                </p>
                                <p class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $forecast->date->format('Y/m/d') }}
                                    </span>
                                    <span class="text-base font-medium text-gray-900 dark:text-gray-400">
                                        {{ $forecast->temperature }}°C
                                    </span>
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endforeach
        </div>
    </div>
</x-layout>
