<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <title>Pixel Positions</title>
</head>

<body class="bg-black pb-0">

    <div class="px-4 text-white sm:px-6 lg:px-10">
        <nav class="border-b border-white/10 py-4">
            <div class="flex items-center justify-between gap-4">
                <a href="/" class="shrink-0">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Pixel Positions Logo" class="w-24">
                </a>

                <div class="hidden items-center gap-6 font-bold md:flex">
                    <a href="/" class="hover:text-cyan-400">Home</a>
                    <a href="/teachers" class="hover:text-cyan-400">Teachers</a>
                    <a href="/books" class="hover:text-cyan-400">Quran</a>
                    <a href="/academic" class="hover:text-cyan-400">Academic</a>
                    <a href="/hadith" class="hover:text-cyan-400">Hadith</a>
                    <a href="/duas" class="hover:text-cyan-400">Du'as</a>
                    <a href="/prayers" class="hover:text-cyan-400">Prayers</a>
                </div>

                <div class="hidden items-center gap-6 md:flex">
                    @auth
                    <a href="/jobs/create" class="hover:text-cyan-400">Post a job</a>

                    <form action="/logout" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="cursor-pointer text-blue-500 hover:text-blue-700">Logout</button>
                    </form>
                    @endauth

                    @guest
                    <a href="{{ route('login') }}" class="hover:text-cyan-400">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-cyan-400">Sign Up</a>
                    @endguest
                </div>

                <details class="group md:hidden">
                    <summary class="list-none cursor-pointer text-white hover:text-cyan-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </summary>

                    <div class="absolute right-4 top-16 z-50 w-[min(90vw,20rem)] rounded-xl border border-white/10 bg-black/95 p-4 shadow-2xl shadow-black/60 sm:right-6">
                        <div class="grid gap-3 text-sm font-semibold">
                            <a href="/" class="hover:text-cyan-400">Home</a>
                            <a href="/teachers" class="hover:text-cyan-400">Teachers</a>
                            <a href="/books" class="hover:text-cyan-400">Quran</a>
                            <a href="/academic" class="hover:text-cyan-400">Academic</a>
                            <a href="/hadith" class="hover:text-cyan-400">Hadith</a>
                            <a href="/duas" class="hover:text-cyan-400">Du'as</a>
                            <a href="/prayers" class="hover:text-cyan-400">Prayers</a>

                            <div class="my-1 h-px bg-white/10"></div>

                            @auth
                            <a href="/jobs/create" class="hover:text-cyan-400">Post a job</a>

                            <form action="/logout" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cursor-pointer text-left text-blue-500 hover:text-blue-700">Logout</button>
                            </form>
                            @endauth

                            @guest
                            <a href="{{ route('login') }}" class="hover:text-cyan-400">Login</a>
                            <a href="{{ route('register') }}" class="hover:text-cyan-400">Sign Up</a>
                            @endguest
                        </div>
                    </div>
                </details>
            </div>
        </nav>

        <main class="mx-auto mt-10 max-w-6xl">
            {{ $slot }}
        </main>

        <x-footer />
    </div>
</body>

</html>