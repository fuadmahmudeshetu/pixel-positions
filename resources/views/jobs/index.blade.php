<x-layout>

    <div class="space-y-7 sm:space-y-10">

        <section class="mx-auto max-w-4xl px-3 pt-4 text-center sm:px-0 sm:pt-6">
            <h1 class="text-2xl font-bold leading-tight sm:text-3xl lg:text-4xl">
                وَقُل رَّبِّ زِدْنِي عِلْمًا
            </h1>

            <h1 class="mt-3 text-2xl font-bold leading-tight sm:text-3xl lg:text-4xl">
                And say, "My Lord, increase me in knowledge."
            </h1>

            <x-search-form />

        </section>

        <!-- // Featured Jobs Section -->
        <section id="featured-jobs" class="pt-6 sm:pt-10">
            <x-section-heading>
                Featured Jobs
            </x-section-heading>

            <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
                @forelse($featuredJobs as $job)
                    <x-job-card :$job />
                @empty
                    <div class="col-span-full text-center py-10 bg-white/5 rounded-2xl border border-white/10">
                        <p class="text-gray-400">No featured jobs at the moment.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8 flex items-center justify-center">
                {{ $featuredJobs->links() }}
            </div>
        </section>

        <!-- // Recent Jobs Section -->
        <section id="recent-jobs" class="mt-4 sm:mt-10">
            <x-section-heading>Recent Jobs</x-section-heading>

            <div class="mt-5 space-y-4 sm:mt-6 sm:space-y-6">
                @forelse($jobs as $job)
                    <x-job-card-wide :$job />
                @empty
                    <div class="text-center py-10 bg-white/5 rounded-2xl border border-white/10">
                        <p class="text-gray-400">No recent jobs available.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8 flex items-center justify-center">
                {{ $jobs->links() }}
            </div>
        </section>

    </div>
</x-layout>
