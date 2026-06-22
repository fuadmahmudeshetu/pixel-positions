<footer class="border-t border-white/10 mt-16 sm:mt-20 lg:mt-24">
    <div class="px-4 py-8 sm:px-6 sm:py-12 lg:px-10 lg:py-16">
        <div class="mx-auto max-w-6xl">
            <!-- Footer Grid -->
            <div class="grid gap-8 sm:gap-10 lg:gap-12 grid-cols-2 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Brand Section -->
                <div>
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Pixel Positions Logo" class="w-20 mb-3">
                    <p class="text-xs sm:text-sm text-white/60 leading-relaxed">
                        Connecting talented job seekers with meaningful opportunities in education and Islamic studies.
                    </p>
                </div>

                <!-- Navigation -->
                <div>
                    <h3 class="text-sm font-bold text-white mb-3 sm:mb-4 uppercase tracking-wide">Navigation</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-xs sm:text-sm text-white/70 hover:text-cyan-400 transition-colors">Home</a></li>
                        <li><a href="{{ route('jobs.teachers') }}" class="text-xs sm:text-sm text-white/70 hover:text-cyan-400 transition-colors">Teachers</a></li>
                        <li><a href="{{ route('jobs.books') }}" class="text-xs sm:text-sm text-white/70 hover:text-cyan-400 transition-colors">Quran</a></li>
                        <li><a href="{{ route('jobs.academic') }}" class="text-xs sm:text-sm text-white/70 hover:text-cyan-400 transition-colors">Academic</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div>
                    <h3 class="text-sm font-bold text-white mb-3 sm:mb-4 uppercase tracking-wide">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('jobs.hadith') }}" class="text-xs sm:text-sm text-white/70 hover:text-cyan-400 transition-colors">Hadith</a></li>
                        <li><a href="{{ route('jobs.duas') }}" class="text-xs sm:text-sm text-white/70 hover:text-cyan-400 transition-colors">Du'as</a></li>
                        <li><a href="{{ route('jobs.prayers') }}" class="text-xs sm:text-sm text-white/70 hover:text-cyan-400 transition-colors">Prayers</a></li>
                        @auth
                        <li><a href="{{ route('jobs.create') }}" class="text-xs sm:text-sm text-white/70 hover:text-cyan-400 transition-colors">Post a Job</a></li>
                        @endauth
                    </ul>
                </div>

                <!-- Connect -->
                <div>
                    <h3 class="text-sm font-bold text-white mb-3 sm:mb-4 uppercase tracking-wide">Connect</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-xs sm:text-sm text-white/70 hover:text-cyan-400 transition-colors">Twitter</a></li>
                        <li><a href="#" class="text-xs sm:text-sm text-white/70 hover:text-cyan-400 transition-colors">LinkedIn</a></li>
                        <li><a href="#" class="text-xs sm:text-sm text-white/70 hover:text-cyan-400 transition-colors">Facebook</a></li>
                        <li><a href="#" class="text-xs sm:text-sm text-white/70 hover:text-cyan-400 transition-colors">Instagram</a></li>
                    </ul>
                </div>
            </div>

            <!-- Footer Divider -->
            <div class="my-8 sm:my-10 h-px bg-white/10"></div>

            <!-- Footer Bottom -->
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-xs sm:text-sm text-white/50">
                    &copy; 2026 Pixel Positions. All rights reserved.
                </p>
                <div class="flex gap-6 text-xs sm:text-sm">
                    <a href="#" class="text-white/50 hover:text-cyan-400 transition-colors">Privacy Policy</a>
                    <a href="#" class="text-white/50 hover:text-cyan-400 transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
</footer>