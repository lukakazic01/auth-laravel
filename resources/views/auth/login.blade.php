<x-layout>
    <div class="flex justify-center items-center grow">
        <form method="POST" action="{{ route('login.store') }}" class="max-w-150 w-full flex flex-col gap-4">
            <input
                name="email"
                type="email"
                required
                placeholder="Enter your email"
                @class([
                    "border outline-none rounded p-2 dark:border-gray-200 dark:bg-white",
                    "border-red-500" => $errors->has('email')
                ])
            />
            @if ($errors->has('email'))
                <p class="text-red-500">{{ $errors->first('email') }}</p>
            @endif
            <input
                name="password"
                required
                placeholder="Enter your password"
                @class([
                    "border outline-none rounded p-2 dark:border-gray-200 dark:bg-white",
                    "border-red-500" => $errors->has('password')
                ])
            />
            @if ($errors->has('password'))
                <p class="text-red-500">{{ $errors->first('password') }}</p>
            @endif
            <button class="w-full p-2 cursor-pointer bg-blue-500 text-white rounded ">
                Submit
            </button>
        </form>
    </div>
</x-layout>
