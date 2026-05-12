<x-layout>
    <div class="relative min-h-screen overflow-hidden bg-black text-white font-sans selection:bg-cyan-500/30">
        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(255,255,255,0.04),transparent_28%),radial-gradient(circle_at_top_right,rgba(255,255,255,0.03),transparent_26%),radial-gradient(circle_at_bottom,rgba(255,255,255,0.02),transparent_30%)]"></div>

        <!-- Navigation / Header -->
        <header class="sticky top-0 z-50 border-b border-white/10 bg-black/80 backdrop-blur-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center shadow-lg shadow-black/40 ring-1 ring-white/10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold tracking-tight">Daily<span class="text-cyan-300">Prayers</span></span>
                    </div>
                    <button class="p-2 rounded-full bg-white/5 hover:bg-white/10 transition-colors border border-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        <main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">

            <!-- Page Introduction -->
            <div class="mb-10 text-center sm:text-left">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-white mb-3">The Five Obligatory Prayers</h1>
                <p class="text-white/55 max-w-2xl">Establishing the daily Salah as a pillar of faith and a connection to the Divine throughout the day and night.</p>
            </div>

            <!-- Grid Container -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- 1. Fajr -->
                <div class="rounded-2xl bg-black/70 border border-white/10 overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:border-cyan-400/30 group shadow-lg shadow-black/30">
                    <div class="px-5 py-4 bg-white/5 border-b border-white/10 flex justify-between items-center">
                        <span class="text-xs font-bold uppercase tracking-widest text-emerald-400">Dawn • 2 Rak'ahs</span>
                        <span class="text-white/40 text-[10px] font-mono">FAJR</span>
                    </div>
                    <div class="p-6 space-y-4">
                        <p class="text-3xl text-right leading-loose font-arabic text-white" dir="rtl">صلاة الفجر</p>
                        <p class="text-sm text-white/75 leading-relaxed">Performed at the first light of dawn before sunrise. It signifies the spiritual awakening of the soul.</p>
                        <div class="pt-4 border-t border-white/5 flex justify-between items-center">
                            <span class="text-xs text-white/35 italic">Sunlight: Pre-Dawn</span>
                        </div>
                    </div>
                </div>

                <!-- 2. Dhuhr -->
                <div class="rounded-2xl bg-black/70 border border-white/10 overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:border-orange-400/30 group shadow-lg shadow-black/30">
                    <div class="px-5 py-4 bg-white/5 border-b border-white/10 flex justify-between items-center">
                        <span class="text-orange-400 text-xs font-bold uppercase tracking-widest">Noon • 4 Rak'ahs</span>
                        <span class="text-white/40 text-[10px] font-mono">DHUHR</span>
                    </div>
                    <div class="p-6 space-y-4">
                        <p class="text-3xl text-right leading-loose font-arabic text-white" dir="rtl">صلاة الظهر</p>
                        <p class="text-sm text-white/75 leading-relaxed">Observed once the sun passes its zenith. A moment to pause during the peak of daily worldly affairs.</p>
                        <div class="pt-4 border-t border-white/5 flex justify-between items-center">
                            <span class="text-xs text-white/35 italic">Sunlight: Mid-day</span>
                        </div>
                    </div>
                </div>

                <!-- 3. Asr -->
                <div class="rounded-2xl bg-black/70 border border-white/10 overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:border-yellow-400/30 group shadow-lg shadow-black/30">
                    <div class="px-5 py-4 bg-white/5 border-b border-white/10 flex justify-between items-center">
                        <span class="text-yellow-400 text-xs font-bold uppercase tracking-widest">Afternoon • 4 Rak'ahs</span>
                        <span class="text-white/40 text-[10px] font-mono">ASR</span>
                    </div>
                    <div class="p-6 space-y-4">
                        <p class="text-3xl text-right leading-loose font-arabic text-white" dir="rtl">صلاة العصر</p>
                        <p class="text-sm text-white/75 leading-relaxed">The "Middle Prayer," performed in the late afternoon. Highly emphasized for its discipline and timing.</p>
                        <div class="pt-4 border-t border-white/5 flex justify-between items-center">
                            <span class="text-xs text-white/35 italic">Sunlight: Late Afternoon</span>
                        </div>
                    </div>
                </div>

                <!-- 4. Maghrib -->
                <div class="rounded-2xl bg-black/70 border border-white/10 overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:border-pink-400/30 group shadow-lg shadow-black/30">
                    <div class="px-5 py-4 bg-white/5 border-b border-white/10 flex justify-between items-center">
                        <span class="text-pink-400 text-xs font-bold uppercase tracking-widest">Sunset • 3 Rak'ahs</span>
                        <span class="text-white/40 text-[10px] font-mono">MAGHRIB</span>
                    </div>
                    <div class="p-6 space-y-4">
                        <p class="text-3xl text-right leading-loose font-arabic text-white" dir="rtl">صلاة المغرب</p>
                        <p class="text-sm text-white/75 leading-relaxed">Offered immediately after sunset. It marks the transition from the light of day to the quiet of night.</p>
                        <div class="pt-4 border-t border-white/5 flex justify-between items-center">
                            <span class="text-xs text-white/35 italic">Sunlight: Dusk</span>
                        </div>
                    </div>
                </div>

                <!-- 5. Isha -->
                <div class="rounded-2xl bg-black/70 border border-white/10 overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:border-indigo-400/30 group shadow-lg shadow-black/30">
                    <div class="px-5 py-4 bg-white/5 border-b border-white/10 flex justify-between items-center">
                        <span class="text-indigo-400 text-xs font-bold uppercase tracking-widest">Night • 4 Rak'ahs</span>
                        <span class="text-white/40 text-[10px] font-mono">ISHA</span>
                    </div>
                    <div class="p-6 space-y-4">
                        <p class="text-3xl text-right leading-loose font-arabic text-white" dir="rtl">صلاة العشاء</p>
                        <p class="text-sm text-white/75 leading-relaxed">The final prayer of the day, performed when complete darkness has fallen. A peaceful conclusion to the day.</p>
                        <div class="pt-4 border-t border-white/5 flex justify-between items-center">
                            <span class="text-xs text-white/35 italic">Sunlight: Nightfall</span>
                        </div>
                    </div>
                </div>

                <!-- Bonus: Witr / Qiyam -->
                <div class="rounded-2xl bg-white/5 border border-dashed border-white/10 overflow-hidden transition-all duration-300 hover:bg-white/[0.07] group">
                    <div class="px-5 py-4 bg-transparent border-b border-white/10 flex justify-between items-center">
                        <span class="text-white/40 text-xs font-bold uppercase tracking-widest">Sunnah Mu'akkadah</span>
                        <span class="text-white/20 text-[10px] font-mono">WITR</span>
                    </div>
                    <div class="p-6 flex flex-col items-center justify-center text-center space-y-3 h-full min-h-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <p class="text-sm text-white/40 italic">Nightly Witr and Tahajjud prayers offer an intimate spiritual connection during the third part of the night.</p>
                    </div>
                </div>

            </div>
        </main>

        <footer class="relative z-10 border-t border-white/10 py-10 mt-12 text-center bg-black/30">
            <p class="text-white/35 text-sm font-medium tracking-wide italic">"Indeed, prayer prohibits immorality and wrongdoing." — 29:45</p>
        </footer>
    </div>
</x-layout>