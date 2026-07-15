<x-layout>
    <div class="p-10 flex items-center justify-center w-full flex-col bg-gray-50 dark:bg-gray-900 min-h-screen">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Weather Forecasts</h1>
        @if(session()->has('success'))
            <div class="bg-green-100 rounded-lg mb-6 border border-green-500 text-green-500 w-full px-6 py-4 text-center">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6 w-full">
            @foreach($cities as $city)
                <x-forecast-card  :city="$city"/>
            @endforeach
        </div>
    </div>
</x-layout>
