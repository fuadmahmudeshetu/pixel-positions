<x-layout>
    <div class="mx-auto max-w-6xl space-y-10 px-3 py-8 sm:space-y-14 sm:px-6 sm:py-12 lg:px-8 lg:py-16">
        
        <!-- Hero Section -->
        <section class="max-w-3xl mx-auto text-center">
            <h1 class="text-3xl font-extrabold tracking-tighter sm:text-4xl md:text-5xl lg:text-6xl text-white leading-tight">
                Academic Resources
            </h1>
            <p class="mt-4 text-base leading-relaxed text-white/70 sm:mt-6 sm:text-lg sm:leading-8">
                Access a comprehensive library of curriculum guides, past papers, and interactive learning modules curated by top educators.
            </p>
            
            <!-- Search Bar (Adds Realism) -->
            <div class="mt-6 mx-auto w-full max-w-lg sm:mt-8">
                <div class="flex items-center gap-2 rounded-xl bg-white/5 p-2.5 sm:p-3 ring-1 ring-white/10 transition-all duration-300 focus-within:ring-blue-500/50 focus-within:bg-white/10">
                    <svg class="h-4 w-4 shrink-0 text-white/40 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" placeholder="Search for books, notes, or topics..." class="w-full bg-transparent border-none text-sm text-white placeholder-white/40 focus:outline-none focus:ring-0 py-1.5 sm:py-2 sm:text-base" />
                </div>
            </div>
        </section>

        <hr class="border-white/10">

        <!-- Resource Categories Grid -->
        <section>
            <div class="flex flex-col gap-4 items-start justify-between mb-6 sm:mb-8 sm:flex-row sm:items-end">
                <div>
                    <h2 class="text-2xl font-bold text-white sm:text-3xl">Browse by Category</h2>
                    <p class="mt-2 text-xs text-white/50 sm:text-sm">Find exactly what you need for your level.</p>
                </div>
                <a href="{{ route('jobs.teachers') }}" class="text-blue-400 hover:text-blue-300 text-xs font-semibold transition-colors sm:text-sm whitespace-nowrap">
                    Find a Tutor &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 sm:gap-5 lg:gap-6">
                @php
                    $categories = [
                        ['title' => 'Study Guides', 'icon' => '📚', 'count' => '120+ Materials'],
                        ['title' => 'Video Tutorials', 'icon' => '🎥', 'count' => '45 Courses'],
                        ['title' => 'Past Exams', 'icon' => '📝', 'count' => '10 Years'],
                        ['title' => 'Research Papers', 'icon' => '🧪', 'count' => '850+ Docs'],
                    ];
                @endphp

                @foreach($categories as $category)
                <div class="group relative rounded-xl sm:rounded-2xl bg-linear-to-br from-white/5 to-white/2 p-5 sm:p-6 lg:p-7 hover:from-white/10 hover:to-white/5 transition-all duration-300 border border-white/10 hover:border-blue-500/30">
                    <div class="text-2xl mb-3 sm:mb-4 sm:text-3xl block">{{ $category['icon'] }}</div>
                    <h3 class="text-base font-bold text-white sm:text-lg">{{ $category['title'] }}</h3>
                    <p class="mt-1.5 text-xs text-white/40 sm:text-sm">{{ $category['count'] }}</p>
                    <a href="#" class="absolute inset-0 ring-1 ring-inset ring-transparent group-hover:ring-blue-500/20 rounded-xl sm:rounded-2xl"></a>
                </div>
                @endforeach
            </div>
        </section>

        <!-- CTA Section -->
        <section class="rounded-2xl sm:rounded-3xl bg-linear-to-r from-blue-900/40 via-blue-800/30 to-cyan-900/20 border border-blue-700/20 p-6 sm:p-10 lg:p-12 text-center transition-all duration-300 hover:border-blue-600/40 hover:from-blue-900/50 hover:via-blue-800/40">
            <h2 class="text-2xl font-bold text-white sm:text-3xl lg:text-4xl leading-tight">Can't find what you're looking for?</h2>
            <p class="mt-3 text-sm text-white/70 max-w-2xl mx-auto sm:mt-4 sm:text-base lg:mt-5 leading-relaxed">
                Connect with our certified educators for personalized 1-on-1 guidance and custom study plans.
            </p>
            <div class="mt-6 flex flex-col gap-3 items-center justify-center sm:mt-8 sm:flex-row sm:gap-4">
                <a href="{{ route('jobs.teachers') }}" class="w-full rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-bold text-white hover:bg-blue-500 transition-all duration-200 shadow-lg shadow-blue-900/20 hover:shadow-blue-900/30 sm:w-auto sm:px-8 sm:py-3 sm:text-base hover:scale-105">
                    Connect with Teachers
                </a>
                <a href="{{ route('home') }}" class="w-full rounded-lg border border-white/20 px-6 py-2.5 text-sm font-semibold text-white hover:bg-white/5 hover:border-white/40 transition-all duration-200 sm:w-auto sm:px-8 sm:py-3 sm:text-base">
                    Return to Homepage
                </a>
            </div>
        </section>
    </div>
</x-layout>