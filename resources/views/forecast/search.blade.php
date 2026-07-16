<x-layout>
    <div class="container mx-auto px-6 py-10">
        <div class="w-full flex flex-wrap gap-6">
            @foreach($cities as $city)
                <div class="bg-mauve-400 dark:bg-gray-700 text-white px-6 py-4 rounded md:w-[calc(25%-24px)] xs:w-[calc(33%-24px)] w-full">
                    {{ $city->name }}
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
