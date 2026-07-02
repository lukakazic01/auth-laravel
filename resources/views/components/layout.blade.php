<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App</title>
    <script>
        // The logic is here to prevent flashing of light and dark theme when switching pages, refreshing, etc.
        (function() {
            const theme = localStorage.getItem('theme');
            if (theme === 'dark' || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col">
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
    <div class="flex grow bg-white dark:bg-slate-500">
        {{ $slot }}
    </div>
</body>
