<x-layout>
    <div class="container mx-auto mt-10">
        <div class="relative overflow-x-auto bg-white shadow-sm rounded-lg border border-gray-200">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-sm text-gray-700 bg-gray-100 border-b border-gray-300">
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
                    <th scope="col" class="px-6 py-3 font-medium">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($cities as $city)
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $city->city }}</td>
                        <td class="px-6 py-4">{{ $city->temperature }}</td>
                        <td class="px-6 py-4">{{ $city->condition }}</td>
                        <td class="px-6 py-4">{{ $city->chance_to_rain }}</td>
                        <td class="px-6 py-4">{{ $city->humidity }}</td>
                        <td class="px-6 py-4">{{ $city->wind_speed }}</td>
                        <td class="px-6 py-4">{{ $city->created_at->format('d/m/Y') }}</td>
                        <td class="flex items-center px-6 py-4">
                            <a href="{{ route('admin.edit-city', $city->id) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                            <a href="#" class="font-medium text-red-600 hover:underline ms-3">Remove</a>
                        </td>
                    </tr>
                    @empty
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                        <td colspan="8" class="text-center px-6 py-4">
                            Sorry, there is no any weather information currently,
                            <a class="text-blue-400 underline font-bold" href="{{ route('admin.create-city') }}">add one.</a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
