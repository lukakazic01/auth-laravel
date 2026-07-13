<div class="relative overflow-x-auto shadow-sm rounded-lg border border-gray-200 dark:border-0">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-sm text-gray-700 dark:text-white bg-gray-100 dark:bg-gray-700 border-b border-gray-300 dark:border-b-0">
        <tr>
            <th scope="col" class="px-6 py-3 font-medium">
                City
            </th>
            <th scope="col" class="px-6 py-3 font-medium">
                Temperature
            </th>
            <th scope="col" class="px-6 py-3 font-medium">
                Condition
            </th>
            <th scope="col" class="px-6 py-3 font-medium">
                Chance to rain
            </th>
            <th scope="col" class="px-6 py-3 font-medium">
                Humidity
            </th>
            <th scope="col" class="px-6 py-3 font-medium">
                Wind speed
            </th>
            <th scope="col" class="px-6 py-3 font-medium">
                Created at
            </th>
            @if ($isAdmin())
                <th scope="col" class="px-6 py-3 font-medium">
                    Actions
                </th>
            @endif
        </tr>
        </thead>
        <tbody>
        @forelse($weathers as $weather)
            <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <a href="{{ route('show-city', $weather->city->name) }}" class="font-bold underline">
                        {{ $weather->city->name }}
                    </a>
                </td>
                <td class="px-6 py-4">{{ $weather->temperature }}</td>
                <td class="px-6 py-4">
                    <img
                        src="{{ config("constants.weatherTypes.$weather->condition") }}"
                        width="64"
                        height="64"
                        alt="{{ $weather->condition }}"
                    />
                </td>
                <td class="px-6 py-4">{{ $weather->chance_to_rain }}</td>
                <td class="px-6 py-4">{{ $weather->humidity }}</td>
                <td class="px-6 py-4">{{ $weather->wind_speed }}</td>
                <td class="px-6 py-4">{{ $weather->created_at->format('d/m/Y') }}</td>
                @if ($isAdmin())
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.edit-weather', $weather->id) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.destroy-weather', $weather->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cursor-pointer font-medium text-red-600 hover:underline ms-3">Remove</button>
                            </form>
                        </div>
                    </td>
                @endif
            </tr>
        @empty
            <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                <td colspan="8" class="text-center px-6 py-4">
                    Sorry, there is no any weather information currently,
                    <a class="text-blue-400 underline font-bold" href="{{ route('admin.create-weather') }}">add one.</a>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
