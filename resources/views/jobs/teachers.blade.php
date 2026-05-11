<x-layout>
    <!-- // Featured Jobs Section -->
    <section id="featured-jobs" class="pt-10">
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
    <section id="recent-jobs" class="mt-10 mb-4 sm:mt-12">
        <x-section-heading class="sm:ml-4">Recent Teachers</x-section-heading>

        <div class="mt-5 space-y-4 sm:mt-6 sm:space-y-6">
            @foreach($jobs as $job)
            <x-job-card-wide :$job />
            @endforeach
        </div>

        <div class="mt-8 flex items-center justify-center">
            {{ $jobs->links() }}
        </div>
    </section>
</x-layout>