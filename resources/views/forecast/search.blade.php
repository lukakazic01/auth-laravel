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
                <x-favorite-city-card :city="$city" class="md:w-[calc(25%-24px)] xs:w-[calc(33%-24px)] w-full" />
            @endforeach
        </div>
    </div>
</x-layout>
