<x-layout>
    <div class="flex justify-center items-center grow">
        <form method="POST" action="{{ route('admin.update-weather', $weather->id) }}" class="max-w-150 w-full flex flex-col gap-4">
            @csrf
            @method('PATCH')
            <select
                name="city_id"
                required
                class="border outline-none rounded p-2 dark:border-gray-200 dark:bg-white disabled:opacity-50 disabled:cursor-not-allowed"
                disabled
            >
                @foreach($cities as $city)
                    <option @selected($city->id === $weather->city_id) value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
            <input
                name="temperature"
                type="number"
                step="0.1"
                required
                placeholder="Enter temperature..."
                value="{{ old('temperature', $weather->temperature) }}"
                @class([
                    "border outline-none rounded p-2 dark:border-gray-200 dark:bg-white",
                    "border-red-500" => $errors->has('temperature')
                ])
            />
            @if ($errors->has('temperature'))
                <p class="text-red-500">{{ $errors->first('temperature') }}</p>
            @endif
            <select
                name="condition"
                required
                @class([
                    "border outline-none rounded p-2 dark:border-gray-200 dark:bg-white",
                    "border-red-500" => $errors->has('condition')
                ])
            >
                <option @selected(old('condition', $weather->condition) === 'Cloudy')>Cloudy</option>
                <option @selected(old('condition', $weather->condition) === 'Partly cloudy')>Partly cloudy</option>
                <option @selected(old('condition', $weather->condition) === 'Sunny')>Sunny</option>
                <option @selected(old('condition', $weather->condition) === 'Rainy')>Rainy</option>
                <option @selected(old('condition', $weather->condition) === 'Stormy')>Stormy</option>
            </select>
            @if ($errors->has('condition'))
                <p class="text-red-500">{{ $errors->first('condition') }}</p>
            @endif
            <input
                name="chanceToRain"
                type="number"
                required
                placeholder="Chance to rain"
                value="{{  old('chanceToRain', $weather->chance_to_rain) }}"
                @class([
                    "border outline-none rounded p-2 dark:border-gray-200 dark:bg-white",
                    "border-red-500" => $errors->has('chanceToRain')
                ])
            />
            @if ($errors->has('chanceToRain'))
                <p class="text-red-500">{{ $errors->first('chanceToRain') }}</p>
            @endif
            <input
                name="humidity"
                type="number"
                required
                placeholder="Enter humidity"
                value="{{ old('humidity', $weather->humidity) }}"
                @class([
                    "border outline-none rounded p-2 dark:border-gray-200 dark:bg-white",
                    "border-red-500" => $errors->has('humidity')
                ])
            />
            @if ($errors->has('humidity'))
                <p class="text-red-500">{{ $errors->first('humidity') }}</p>
            @endif
            <input
                name="windSpeed"
                type="number"
                required
                placeholder="Enter wind speed"
                value="{{ old('windSpeed', $weather->wind_speed) }}"
                @class([
                    "border outline-none rounded p-2 dark:border-gray-200 dark:bg-white",
                    "border-red-500" => $errors->has('windSpeed')
                ])
            />
            @if ($errors->has('windSpeed'))
                <p class="text-red-500">{{ $errors->first('windSpeed') }}</p>
            @endif
            <button class="w-full p-2 cursor-pointer bg-blue-500 text-white rounded">
                Submit
            </button>
        </form>
    </div>
</x-layout>
