<x-layout>
    <div class="flex justify-center items-center grow">
        <form method="POST" action="{{ route('admin.store-forecast') }}" class="max-w-150 w-full flex flex-col gap-4">
            @csrf
            <select
                name="city_id"
                required
                class="border outline-none rounded p-2 dark:border-gray-200 dark:bg-white"
            >
                <option disabled>Select the city</option>
                @foreach($cities as $city)
                    <option @selected((int)old('city_id') === $city->id) value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
            <input
                name="temperature"
                type="number"
                step="0.1"
                required
                placeholder="Enter temperature..."
                value="{{ old('temperature') }}"
                @class([
                    "border outline-none rounded p-2 dark:border-gray-200 dark:bg-white",
                    "border-red-500" => $errors->has('temperature')
                ])
            />
            @if ($errors->has('temperature'))
                <p class="text-red-500">{{ $errors->first('temperature') }}</p>
            @endif
            <select
                name="weather_type"
                required
                @class([
                    "border outline-none rounded p-2 dark:border-gray-200 dark:bg-white",
                    "border-red-500" => $errors->has('condition')
                ])
            >
                <option @selected(old('condition') === 'Sunny')>Sunny</option>
                <option @selected(old('condition') === 'Cloudy')>Cloudy</option>
                <option @selected(old('condition') === 'Partly cloudy')>Partly cloudy</option>
                <option @selected(old('condition') === 'Rainy')>Rainy</option>
                <option @selected(old('condition') === 'Stormy')>Stormy</option>
                <option @selected(old('condition') === 'Snowy')>Snowy</option>
            </select>
            @if ($errors->has('condition'))
                <p class="text-red-500">{{ $errors->first('condition') }}</p>
            @endif
            <input
                name="probability"
                type="number"
                required
                placeholder="Enter probability"
                value="{{ old('probability') }}"
                @class([
                    "border outline-none rounded p-2 dark:border-gray-200 dark:bg-white",
                    "border-red-500" => $errors->has('probability')
                ])
            />
            @if ($errors->has('probability'))
                <p class="text-red-500">{{ $errors->first('probability') }}</p>
            @endif
            <input
                name="date"
                type="date"
                required
                placeholder="Enter date of the forecast"
                min="{{ now()->format('Y-m-d') }}"
                value="{{ old('date') }}"
                @class([
                    "border outline-none rounded p-2 dark:border-gray-200 dark:bg-white",
                    "border-red-500" => $errors->has('date')
                ])
            />
            @if ($errors->has('date'))
                <p class="text-red-500">{{ $errors->first('date') }}</p>
            @endif
            <button type="submit" class="w-full p-2 cursor-pointer bg-blue-500 text-white rounded">
                Submit
            </button>
        </form>
    </div>
</x-layout>
