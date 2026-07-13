<nav class="bg-red-400 dark:bg-gray-700 text-white flex items-center justify-between p-4 gap-6">
    @guest
        <div class="flex items-center gap-6">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    @endguest
    @auth
        <div class="flex justify-between w-full gap-6">
            <div class="flex items-center gap-6">
                <a href="{{ route('home') }}">Home</a>
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <a href="{{ route('admin.create-weather') }}">Create city</a>
                @endif
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="cursor-pointer">Logout</button>
            </form>
        </div>

    @endauth
    <x-theme-switcher />
</nav>
