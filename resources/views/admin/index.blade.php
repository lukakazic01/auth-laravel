<x-layout>
    <div class="container mx-auto mt-10">
        @if(session()->has('success'))
            <div class="bg-green-100 rounded-lg mb-6 border border-green-500 text-green-500 w-full px-6 py-4 text-center">
                {{ session()->get('success') }}
            </div>
        @endif
        <x-weather-table :cities="$cities" />
    </div>
</x-layout>
