<x-layout>
    <div class="container mx-auto px-6 py-10">
        @if (session()->has('error'))
            <div class="text-gray-300 dark:text-gray-500 text-sm text-center my-6">
                {{ session()->get('error') }}
                <a href="{{ route('login') }}" class="text-blue-500 underline">Go back to log in</a>
            </div>
        @endif
        @if(session()->has('success'))
            <div class="bg-green-100 rounded-lg mb-6 border border-green-500 text-green-500 w-full px-6 py-4 text-center">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="w-full flex flex-wrap gap-6">
            @foreach($cities as $city)
                <div class="flex flex-col md:w-[calc(25%-24px)] xs:w-[calc(33%-24px)] w-full">
                    <form action="{{ route('user-favorite', $city->id) }}" method="POST" class="flex justify-end">
                        @csrf
                        <button class="text-lg transition-colors cursor-pointer w-fit bg-mauve-100 dark:bg-gray-600 rounded-tr rounded-tl p-0.5">
                            <i class="{{ $city->isFavorited ? 'fa-solid' : 'fa-regular' }} fa-heart dark:text-gray-400 text-mauve-400"></i>
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
            @endforeach
        </div>
    </div>
</x-layout>
