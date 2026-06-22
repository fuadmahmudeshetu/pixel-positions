<x-layout>
    <x-page-heading>
        Search Results for "{{ request('search') }}"
    </x-page-heading>

    <div class="text-center">
        <x-search-form class="max-w-xl mx-auto" />
    </div>

    <div class="mt-6 space-y-6">
        @forelse($jobs as $job)
            <x-job-card-wide :$job />
        @empty
            <div class="text-center py-12 bg-white/5 rounded-2xl border border-white/10">
                <p class="text-gray-400">No jobs found matching your search.</p>
                <a href="{{ route('home') }}" class="text-cyan-400 hover:underline mt-2 inline-block">View all jobs</a>
            </div>
        @endforelse
    </div>
</x-layout>