<!DOCTYPE html>
<html>
    <x-layout>
        <div class="container mx-auto">
            <div class="flex flex-col gap-6 justify-center items-center">
                <div class="max-w-lg w-full">
                    @if(session()->has('message'))
                        <div class="bg-blue-100 dark:bg-blue-900 rounded-lg mb-6 text-sm border border-blue-500 text-blue-500 w-full px-6 py-4 text- mt-4">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form action="{{ route('forecasts-search') }}" class="flex flex-col gap-4 my-10 w-full">
                        <div class="relative flex items-center">
                            <input name="search" class="border dark:bg-gray-700 dark:border-none dark:text-white text-sm w-full border-gray-200 rounded outline-none pl-2 py-2 pr-7" placeholder="Search by town name..." />
                            <i class="fa-solid fa-search absolute right-2 text-gray-300"></i>
                        </div>
                        <button type="submit" class="bg-green-500 w-full cursor-pointer text-white rounded px-4 py-2">Search</button>
                    </form>
                </div>
            </div>
            <div class="flex flex-col items-center mt-6 gap-6 text-white">
                @auth
                    <h1 class="text-mauve-500 dark:text-gray-500 font-bold text-2xl">Your currently following these cities</h1>
                    <div class="w-full flex flex-wrap gap-6">
                        @forelse($userFavorites as $city)
                            <x-favorite-city-card :city="$city" class="md:w-[calc(25%-24px)] xs:w-[calc(33%-24px)] w-full" />
                        @empty
                            <div class="text-center w-full">
                                <p class="text-sm text-mauve-500 dark:text-gray-500">You currently dont follow any city, add one 😀</p>
                            </div>
                        @endforelse
                    </div>
                @endauth
            </div>
        </div>
    </x-layout>
</html>
