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
                <x-forms.input :label="false" name="search" placeholder="Search teachers..." class="w-full max-w-full rounded-xl border-white/10 bg-white/5 px-4 py-3 sm:max-w-xl sm:px-5 sm:py-4" />
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

            <div class="mt-8">
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

            <div class="mt-8 ">
                {{ $jobs->links() }}
            </div>
        </section>


    </div>
</x-layout>