<nav class="relative border-b border-white/10 py-4">
    <div class="flex items-center justify-between gap-4">
        <!-- Minimized Logo Size on Mobile, Scales back up on Desktop -->
        <a href="{{ route('home') }}" class="shrink-0">
            <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Noor Learning Logo" class="w-16 md:w-24 transition-all">
        </a>

        <!-- Desktop Navigation links -->
        <div class="hidden items-center gap-6 font-bold md:flex">
            @if(auth()->check() && auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="hover:text-cyan-400">Dashboard</a>
                <a href="{{ route('admin.users.') }}" class="hover:text-cyan-400">Users</a>
                <a href="{{ route('admin.jobs') }}" class="hover:text-cyan-400">Jobs</a>
                <a href="{{ route('home') }}" class="hover:text-cyan-400">Main Site</a>
            @else
                <a href="{{ route('home') }}" class="hover:text-cyan-400">Home</a>
                <a href="{{ route('jobs.teachers') }}" class="hover:text-cyan-400">Teachers</a>
                <a href="{{ route('jobs.books') }}" class="hover:text-cyan-400">Quran</a>
                <a href="{{ route('jobs.academic') }}" class="hover:text-cyan-400">Academic</a>
                <a href="{{ route('jobs.hadith') }}" class="hover:text-cyan-400">Hadith</a>
                <a href="{{ route('jobs.duas') }}" class="hover:text-cyan-400">Du'as</a>
                <a href="{{ route('jobs.prayers') }}" class="hover:text-cyan-400">Prayers</a>
            @endif
        </div>

        <!-- Desktop Auth actions -->
        <div class="hidden items-center gap-6 md:flex">
            @auth
                @if(auth()->user()->role === 'teacher' || auth()->user()->role === 'employer')
                    <a href="{{ route('jobs.create') }}" class="hover:text-cyan-400">Post a job</a>
                @endif

                @if(auth()->user()->role !== 'admin')
                    <a href="{{ route('profile.show') }}" class="hover:text-cyan-400">Profile</a>
                @endif

                <form action="{{ route('logout') }}" method="POST">
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

        <!-- Mobile Trigger & Dropdown Menu -->
        <details class="group md:hidden">
            <summary class="list-none cursor-pointer text-white hover:text-cyan-400 focus:outline-none">
                <!-- Hamburger Icon (h-8 w-8) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 display-block group-open:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <!-- Close X Icon (h-8 w-8) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hidden group-open:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </summary>

            <div class="absolute right-0 top-full z-50 mt-2 w-full max-w-sm rounded-xl border border-white/10 bg-black/95 p-5 shadow-2xl shadow-black/80">
                <div class="grid gap-4 text-base font-medium">
                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-cyan-400">Dashboard</a>
                        <a href="{{ route('admin.users.') }}" class="hover:text-cyan-400">Users</a>
                        <a href="{{ route('admin.jobs') }}" class="hover:text-cyan-400">Jobs</a>
                        <a href="{{ route('home') }}" class="hover:text-cyan-400">Main Site</a>
                    @else
                        <a href="{{ route('home') }}" class="hover:text-cyan-400">Home</a>
                        <a href="{{ route('jobs.teachers') }}" class="hover:text-cyan-400">Teachers</a>
                        <a href="{{ route('jobs.books') }}" class="hover:text-cyan-400">Quran</a>
                        <a href="{{ route('jobs.academic') }}" class="hover:text-cyan-400">Academic</a>
                        <a href="{{ route('jobs.hadith') }}" class="hover:text-cyan-400">Hadith</a>
                        <a href="{{ route('jobs.duas') }}" class="hover:text-cyan-400">Du'as</a>
                        <a href="{{ route('jobs.prayers') }}" class="hover:text-cyan-400">Prayers</a>
                    @endif

                    <div class="my-2 h-px bg-white/10"></div>

                    @auth
                        @if(auth()->user()->role === 'teacher' || auth()->user()->role === 'employer')
                            <a href="{{ route('jobs.create') }}" class="hover:text-cyan-400">Post a job</a>
                        @endif

                        @if(in_array(auth()->user()->role, ['student', 'teacher', 'employer'], true))
                            <a href="{{ route('profile.show') }}" class="hover:text-cyan-400">Profile</a>
                        @endif

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="cursor-pointer text-left text-blue-500 hover:text-blue-700">Logout</button>
                        </form>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="hover:text-cyan-400">Login</a>
                        <a href="{{ route('register') }}" class="hover:text-cyan-400">Sign Up</a>
                    @endguest

                    <!-- Visual Separator for Contact Information -->
                    <div class="my-2 h-px bg-white/10"></div>

                    <!-- "Call Us" Section at the bottom -->
                    <a href="tel:0926666969" class="flex items-center gap-3 rounded-lg bg-cyan-500/10 p-3 text-cyan-400 border border-cyan-500/20 hover:bg-cyan-500/20 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.72l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.72.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <div class="flex flex-col text-left">
                            <span class="text-xs uppercase tracking-wider text-white/50">Call Us</span>
                            <span class="font-bold text-white">0926666969</span>
                        </div>
                    </a>
                </div>
            </div>
        </details>
    </div>
</nav>
