<x-layout>
    <x-page-heading>Saved Jobs</x-page-heading>

    <div class="mt-10 space-y-6">
        @forelse($jobs as $job)
            <x-job-card-wide :$job />
        @empty
            <div class="text-center py-20 bg-white/5 rounded-xl border border-white/10">
                <p class="text-gray-400">You haven't saved any jobs yet.</p>
                <a href="{{ route('home') }}" class="text-blue-500 hover:underline mt-2 inline-block">Browse jobs</a>
            </div>
        @endforelse

        <div class="mt-8">
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
