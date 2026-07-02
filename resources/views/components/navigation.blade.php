<nav class="bg-red-400 dark:bg-gray-700 text-white flex items-center justify-between p-4 gap-6">
    @guest
        <div class="flex items-center gap-6">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    @endguest
    @auth
        <div class="flex justify-between w-full gap-6">
            <a class="{{ route('home') }}">Home</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="cursor-pointer">Logout</button>
            </form>
        </div>
    @endauth
    <x-theme-switcher />
</nav>
