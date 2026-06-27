<footer class="relative overflow-hidden bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 border-t border-white/10 mt-16 sm:mt-20 lg:mt-24">
    <!-- Decorative subtle glow -->
    <div class="absolute -top-24 -left-24 h-64 w-64 rounded-full bg-cyan-500/10 blur-3xl"></div>
    <div class="absolute -bottom-32 -right-32 h-80 w-80 rounded-full bg-indigo-500/10 blur-3xl"></div>

    <div class="relative px-4 py-8 sm:px-6 sm:py-12 lg:px-10 lg:py-16">
        <div class="mx-auto max-w-6xl">

            <!-- Footer Grid with refined spacing and hover effects -->
            <div class="grid gap-8 sm:gap-10 lg:gap-12 grid-cols-2 sm:grid-cols-2 lg:grid-cols-4">

                <!-- Brand Section -->
                <div class="col-span-2 sm:col-span-2 lg:col-span-1">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="text-xl font-bold text-white/90 tracking-tight">Noor<span class="text-cyan-400">Learning</span></span>
                    </div>
                    <p class="text-xs sm:text-sm text-white/60 leading-relaxed max-w-xs">
                        Connecting talented job seekers with meaningful opportunities in education and Islamic studies.
                    </p>
                    <!-- subtle social mini icons (decorative) -->
                    <div class="flex gap-3 mt-4">
                        <span class="h-8 w-8 rounded-full bg-white/5 flex items-center justify-center text-white/40 hover:bg-cyan-500/20 hover:text-cyan-300 transition-all duration-300 cursor-default">🐦</span>
                        <span class="h-8 w-8 rounded-full bg-white/5 flex items-center justify-center text-white/40 hover:bg-cyan-500/20 hover:text-cyan-300 transition-all duration-300 cursor-default">🔗</span>
                        <span class="h-8 w-8 rounded-full bg-white/5 flex items-center justify-center text-white/40 hover:bg-cyan-500/20 hover:text-cyan-300 transition-all duration-300 cursor-default">📘</span>
                    </div>
                </div>

                <!-- Navigation -->
                <div>
                    <h3 class="text-xs font-bold text-white/80 mb-3 sm:mb-4 uppercase tracking-wider border-b border-white/5 pb-2">Navigation</h3>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('home') }}" class="text-xs sm:text-sm text-white/60 hover:text-cyan-300 transition-all duration-200 flex items-center gap-2 hover:translate-x-1"><span class="text-cyan-400/50 text-[10px]">◈</span> Home</a></li>
                        <li><a href="{{ route('jobs.teachers') }}" class="text-xs sm:text-sm text-white/60 hover:text-cyan-300 transition-all duration-200 flex items-center gap-2 hover:translate-x-1"><span class="text-cyan-400/50 text-[10px]">◈</span> Teachers</a></li>
                        <li><a href="{{ route('jobs.books') }}" class="text-xs sm:text-sm text-white/60 hover:text-cyan-300 transition-all duration-200 flex items-center gap-2 hover:translate-x-1"><span class="text-cyan-400/50 text-[10px]">◈</span> Quran</a></li>
                        <li><a href="{{ route('jobs.academic') }}" class="text-xs sm:text-sm text-white/60 hover:text-cyan-300 transition-all duration-200 flex items-center gap-2 hover:translate-x-1"><span class="text-cyan-400/50 text-[10px]">◈</span> Academic</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div>
                    <h3 class="text-xs font-bold text-white/80 mb-3 sm:mb-4 uppercase tracking-wider border-b border-white/5 pb-2">Resources</h3>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('jobs.hadith') }}" class="text-xs sm:text-sm text-white/60 hover:text-cyan-300 transition-all duration-200 flex items-center gap-2 hover:translate-x-1"><span class="text-cyan-400/50 text-[10px]">✦</span> Hadith</a></li>
                        <li><a href="{{ route('jobs.duas') }}" class="text-xs sm:text-sm text-white/60 hover:text-cyan-300 transition-all duration-200 flex items-center gap-2 hover:translate-x-1"><span class="text-cyan-400/50 text-[10px]">✦</span> Du'as</a></li>
                        <li><a href="{{ route('jobs.prayers') }}" class="text-xs sm:text-sm text-white/60 hover:text-cyan-300 transition-all duration-200 flex items-center gap-2 hover:translate-x-1"><span class="text-cyan-400/50 text-[10px]">✦</span> Prayers</a></li>
                        @auth
                        <li><a href="{{ route('jobs.create') }}" class="text-xs sm:text-sm text-white/60 hover:text-cyan-300 transition-all duration-200 flex items-center gap-2 hover:translate-x-1"><span class="text-cyan-400/50 text-[10px]">✦</span> Post a Job</a></li>
                        @endauth
                    </ul>
                </div>

                <!-- Connect -->
                <div>
                    <h3 class="text-xs font-bold text-white/80 mb-3 sm:mb-4 uppercase tracking-wider border-b border-white/5 pb-2">Connect</h3>
                    <ul class="space-y-2.5">
                        <li><a href="https://twitter.com" target="_blank" rel="noopener noreferrer" class="text-xs sm:text-sm text-white/60 hover:text-cyan-300 transition-all duration-200 flex items-center gap-2 hover:translate-x-1 group"><span class="text-cyan-400/50 group-hover:text-cyan-300 transition">▶</span> Twitter</a></li>

                        <li><a href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer" class="text-xs sm:text-sm text-white/60 hover:text-cyan-300 transition-all duration-200 flex items-center gap-2 hover:translate-x-1 group"><span class="text-cyan-400/50 group-hover:text-cyan-300 transition">▶</span> LinkedIn</a></li>

                        <li><a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer" class="text-xs sm:text-sm text-white/60 hover:text-cyan-300 transition-all duration-200 flex items-center gap-2 hover:translate-x-1 group"><span class="text-cyan-400/50 group-hover:text-cyan-300 transition">▶</span> Facebook</a></li>

                        <li><a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer" class="text-xs sm:text-sm text-white/60 hover:text-cyan-300 transition-all duration-200 flex items-center gap-2 hover:translate-x-1 group"><span class="text-cyan-400/50 group-hover:text-cyan-300 transition">▶</span> Instagram</a></li>
                    </ul>
                </div>
            </div>

            <!-- Footer Divider with gradient -->
            <div class="my-8 sm:my-10 h-px bg-linear-to-r from-transparent via-white/15 to-transparent"></div>

            <!-- Footer Bottom - enhanced with subtle glow and responsive flex -->
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-xs sm:text-sm text-white/40 font-light tracking-wide">
                    &copy; 2026 <span class="text-white/60">Noor Learning</span>. All rights reserved.
                </p>
                <div class="flex gap-6 text-xs sm:text-sm">
                    <a href="#" class="text-white/40 hover:text-cyan-300 transition-colors duration-300 relative after:absolute after:left-0 after:-bottom-1 after:h-[1px] after:w-0 after:bg-cyan-400 after:transition-all hover:after:w-full">Privacy Policy</a>
                    <a href="#" class="text-white/40 hover:text-cyan-300 transition-colors duration-300 relative after:absolute after:left-0 after:-bottom-1 after:h-[1px] after:w-0 after:bg-cyan-400 after:transition-all hover:after:w-full">Terms of Service</a>
                </div>
            </div>

            <!-- extra subtle decorative line -->
            <div class="mt-6 flex justify-center gap-1 opacity-20">
                <span class="h-1 w-1 rounded-full bg-cyan-400/50"></span>
                <span class="h-1 w-1 rounded-full bg-cyan-400/30"></span>
                <span class="h-1 w-1 rounded-full bg-cyan-400/10"></span>
            </div>
        </div>
    </div>
</footer>