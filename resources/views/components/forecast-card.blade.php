@php use App\View\Components\ForecastCard; @endphp
<section class="bg-mauve-100 dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-5">
    <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 flex items-center justify-between">
        {{ $city->name }}
        <span class="text-xs font-normal text-gray-400 dark:text-gray-500">
            {{ count($city->forecasts) }} {{ count($city->forecasts) > 1 ? 'entries' : 'entry' }}
        </span>
    </h2>
    <ul class="space-y-2">
        @foreach($city->forecasts as $forecast)
            <li class="flex relative flex-col rounded-lg bg-mauve-300 dark:bg-gray-700/60 px-3 py-2">
                <p class="flex justify-between items-center">
                    <img width="30" height="30" alt="{{ $forecast->weather_type }}"
                         src="{{ config("constants.weatherTypes.$forecast->weather_type") }}"/>
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $forecast->weather_type }}</span>
                </p>
                <p class="flex justify-between items-center">
                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $forecast->date->format('Y/m/d') }}
                    </span>
                    <span class="text-base font-semibold {{ ForecastCard::temperatureColor($forecast->temperature) }}">
                        {{ $forecast->temperature }}°C
                    </span>
                </p>
                @if (auth()->user()?->role === "admin")
                    <form method="POST" action="{{ route('admin.destroy-forecast', $forecast->id) }}" class="w-full flex justify-end items-center border-gray-400/20 dark:border-gray-500/30 border-t mt-2 pt-2">
                        @csrf
                        @method('DELETE')
                        <button class="flex cursor-pointer items-center gap-1 text-xs text-gray-400 hover:text-red-500 transition-colors">
                            <i class="fa fa-remove"></i>
                            Delete
                        </button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
</section>
