<x-layout>
    <div class="flex justify-center items-center w-full">
        <div class="max-w-lg w-full bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">

            <div class="px-6 pt-6 pb-4 bg-linear-to-br from-blue-50 to-white dark:from-gray-700 dark:to-gray-800">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $city->name }}</h3>
                        <p class="text-sm text-gray-400 dark:text-gray-400 mt-0.5">
                            Created {{ $city->created_at->format('d/m/Y') }}
                        </p>
                    </div>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <div>
                        <span class="text-4xl font-bold text-gray-900 dark:text-white">{{ $city->weather->temperature }}°</span>
                        <p class="text-base text-gray-500 dark:text-gray-300 capitalize mt-1">{{ $city->weather->condition }}</p>
                    </div>
                    <img
                        src="{{ config("constants.{$city->weather->condition}") }}"
                        width="120"
                        height="120"
                        alt="{{ $city->weather->condition }}"
                    />
                </div>
            </div>

            <div class="grid grid-cols-3 divide-x divide-gray-100 dark:divide-gray-700 border-t border-gray-100 dark:border-gray-700">
                <div class="px-4 py-4 text-center">
                    <p class="text-sm text-gray-400 dark:text-gray-400 mb-1">Rain</p>
                    <p class="font-semibold text-gray-900 dark:text-white">{{ $city->weather->chance_to_rain }}%</p>
                </div>
                <div class="px-4 py-4 text-center">
                    <p class="text-sm text-gray-400 dark:text-gray-400 mb-1">Humidity</p>
                    <p class="font-semibold text-gray-900 dark:text-white">{{ $city->weather->humidity }}%</p>
                </div>
                <div class="px-4 py-4 text-center">
                    <p class="text-sm text-gray-400 dark:text-gray-400 mb-1">Wind</p>
                    <p class="font-semibold text-gray-900 dark:text-white">{{ $city->weather->wind_speed }} km/h</p>
                </div>
            </div>
            <div class="grid grid-cols-5 divide-x divide-gray-100 dark:divide-gray-700 border-t border-gray-100 dark:border-gray-700">
                @foreach($city->forecasts as $forecast)
                    <div class="flex flex-col p-2 items-center">
                        <p class="text-xs text-gray-400 mb-1">
                            {{ $forecast->date->format('d. M y') }}
                        </p>
                        <div class="text-center">
                            {{ $forecast->temperature }} C&#176;
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
