<div {{ $attributes->class(["flex flex-col"])->merge() }}>
    <form action="{{ route('toggle-favorite', $city->id) }}" method="POST" class="flex justify-end">
        @csrf
        <button class="text-lg transition-colors cursor-pointer w-fit bg-mauve-100 dark:bg-gray-600 rounded-tr rounded-tl p-0.5">
            <i class="{{ $city->is_favorite ? 'fa-solid' : 'fa-regular' }} fa-heart text-red-500"></i>
        </button>
    </form>
    <div class="p-4 relative bg-mauve-100 dark:bg-gray-600 rounded rounded-tr-none">
        <a href="{{ route('show-forecast', $city->name) }}" class="block">
            <div class="bg-mauve-400 p-2 flex justify-between items-center dark:bg-gray-800 text-white rounded w-full">
                <span>{{ $city->name }}</span>
                <img height="30" width="30" src="{{ config("constants.weatherTypes.{$city->todaysForecast->weather_type}") }}" />
            </div>
        </a>
    </div>
</div>
