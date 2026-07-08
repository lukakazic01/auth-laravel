<x-layout>
    <div class="flex justify-center items-center grow">
        <form method="POST" action="{{ route('admin.update-city', $city->id) }}" class="max-w-150 w-full flex flex-col gap-4">
            @csrf
            @method('PATCH')
            <input
                name="city"
                required
                placeholder="Enter name of the city"
                value="{{ old('city', $city->city) }}"
                @class([
                    "border outline-none rounded p-2 dark:border-gray-200 dark:bg-white",
                    "border-red-500" => $errors->has('city')
                ])
            />
            @if ($errors->has('city'))
                <p class="text-red-500">{{ $errors->first('city') }}</p>
            @endif
            <input
                name="temperature"
                type="number"
                step="0.1"
                required
                placeholder="Enter temperature..."
                value="{{ old('temperature', $city->temperature) }}"
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
                <option @selected(old('condition', $city->condition) === 'Cloudy')>Cloudy</option>
                <option @selected(old('condition', $city->condition) === 'Partly cloudy')>Partly cloudy</option>
                <option @selected(old('condition', $city->condition) === 'Sunny')>Sunny</option>
                <option @selected(old('condition', $city->condition) === 'Rainy')>Rainy</option>
                <option @selected(old('condition', $city->condition) === 'Stormy')>Stormy</option>
            </select>
            @if ($errors->has('condition'))
                <p class="text-red-500">{{ $errors->first('condition') }}</p>
            @endif
            <input
                name="chanceToRain"
                type="number"
                required
                placeholder="Chance to rain"
                value="{{  old('chanceToRain', $city->chance_to_rain) }}"
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
                value="{{ old('humidity', $city->humidity) }}"
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
                value="{{ old('windSpeed', $city->wind_speed) }}"
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
