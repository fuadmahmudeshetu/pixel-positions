<x-layout>

    <div class="space-y-7 sm:space-y-10">

        <section class="mx-auto max-w-4xl px-3 pt-4 text-center sm:px-0 sm:pt-6">
            <h1 class="text-2xl font-bold leading-tight sm:text-3xl lg:text-4xl">
                وَقُل رَّبِّ زِدْنِي عِلْمًا
            </h1>

            <h1 class="mt-3 text-2xl font-bold leading-tight sm:text-3xl lg:text-4xl">
                And say, "My Lord, increase me in knowledge."
            </h1>

            <x-forms.form action="/search" class="mt-5 sm:mt-6">
                <div class="relative mx-auto max-w-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35m1.35-5.15A7.5 7.5 0 1 1 3 11.5a7.5 7.5 0 0 1 15 0Z" />
                    </svg>
                    <x-forms.input :label="false" name="search" placeholder="Search teachers..." class="w-full max-w-full rounded-xl border-white/10 bg-white/5 py-3 pl-12 pr-4 sm:px-5 sm:py-4 sm:pl-12" />
                </div>
            </x-forms.form>

        </section>

        <!-- // Featured Jobs Section -->
        <section id="featured-jobs" class="pt-6 sm:pt-10">
            <x-section-heading>
                Featured Jobs
            </x-section-heading>

            <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
                @foreach($featuredJobs as $job)
                <x-job-card :$job />
                @endforeach
            </div>

            <div class="mt-8 flex items-center justify-center">
                {{ $featuredJobs->links() }}
            </div>
        </section>

        <!-- // Recent Jobs Section -->
        <section id="recent-jobs" class="mt-4 sm:mt-10">
            <x-section-heading>Recent Jobs</x-section-heading>

            <div class="mt-5 space-y-4 sm:mt-6 sm:space-y-6">
                @foreach($jobs as $job)
                <x-job-card-wide :$job />
                @endforeach
            </div>

            <div class="mt-8 flex items-center justify-center">
                {{ $jobs->links() }}
            </div>
        </section>

    </div>
</x-layout>
