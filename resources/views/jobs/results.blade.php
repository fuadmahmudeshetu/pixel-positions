<x-layout>
    <x-page-heading title="Search Results">
        Search Results for "{{ request('search') }}"
    </x-page-heading>

    <div class="mt-6 space-y-6 gap-6">
        @foreach($jobs as $job)
        <x-job-card-wide :$job />
        @endforeach
    </div>
</x-layout>