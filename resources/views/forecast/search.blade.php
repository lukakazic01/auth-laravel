<x-layout>
    <div class="container mx-auto px-6 py-10">
        <div class="w-full flex flex-wrap gap-6">
            @foreach($cities as $city)
                <a href="{{ route('show-forecast', $city->name) }}" class="p-4 bg-mauve-100 dark:bg-gray-600 rounded md:w-[calc(25%-24px)] xs:w-[calc(33%-24px)] w-full">
                    <div class="bg-mauve-400 p-2 flex justify-between items-center dark:bg-gray-800 text-white rounded w-full">
                        <span>{{ $city->name }}</span>
                        <img height="30" width="30" src="{{ config("constants.weatherTypes.{$city->todaysForecast->weather_type}") }}" />
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layout>
