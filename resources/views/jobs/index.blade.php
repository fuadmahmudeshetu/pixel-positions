<x-layout>

    <div class="space-y-10">

        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl">
                Let's Find Your Next Job
            </h1>

            <form action="" class="mt-6">
                <input type="text" name="" placeholder="Web developer" class="rounded-xl bg-white/5 border-white/10 w-full px-5 py-4 max-w-xl">
            </form>

        </section>

        <!-- // Featured Jobs Section -->
        <section class="pt-10">
            <x-section-heading>
                Feature Jobs
            </x-section-heading>

            <div class="grid grid-cols-3 gap-8 mt-6">
                @foreach($featuredJobs as $job)
                <x-job-card :$job />
                @endforeach
            </div>
        </section>

        <!-- // Tags Section -->
        <section>
            <x-section-heading>Tags</x-section-heading>

            <div class="flex flex-wrap gap-2 mt-4">

                @foreach($tags as $tag)
                <x-tag :$tag />
                @endforeach
            </div>

        </section>

        <!-- // Recent Jobs Section -->
        <section class="mb-4">
            <x-section-heading>Recent Jobs</x-section-heading>

            <div class="mt-6 space-y-6 gap-6">
                @foreach($jobs as $job)
                <x-job-card-wide :$job />
                @endforeach
            </div>
        </section>


    </div>
</x-layout>