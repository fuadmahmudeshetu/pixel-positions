<x-layout>
    <div class="space-y-8">
        <!-- Header with Count -->
        <header class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-white">Jobs Management</h1>
                <p class="mt-1 text-sm text-gray-400">A list of all active job postings</p>
            </div>
            <div class="flex items-center gap-3">
                <span class="rounded-full bg-cyan-500/10 px-3 py-1 text-xs font-medium text-cyan-400 border border-cyan-500/20">
                    {{ $jobs->count() }} Total Jobs
                </span>
            </div>
        </header>

        <!-- Main Container -->
        <div class="relative overflow-hidden rounded-2xl border border-white/10 bg-white/2 backdrop-blur-sm">

            <!-- Desktop/Tablet View -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full min-w-200 text-left text-sm text-white">
                    <thead>
                    <tr class="border-b border-white/10 bg-white/3 text-xs uppercase tracking-widest text-gray-400">
                        <th class="px-6 py-5 font-bold">Employer</th>
                        <th class="px-6 py-5 font-bold">Job Details</th>
                        <th class="px-6 py-5 font-bold">Contact</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                    @forelse ($jobs as $job)
                        <tr class="group hover:bg-white/4 transition-all duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-linear-to-br from-cyan-500 to-blue-600 text-sm font-bold text-white shadow-lg shadow-cyan-500/20">
                                        {{-- Initial of the User's Name --}}
                                        {{ strtoupper(substr($job->employer?->user?->name ?? 'Deleted', 0, 1)) }}
                                    </div>
                                    <span class="font-semibold text-gray-100 group-hover:text-cyan-400">
                                        {{ $job->employer?->user?->name ?? 'Deleted User' }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-400">
                                <div class="flex flex-col">
                                    <span class="text-gray-100 font-medium">{{ $job->title }}</span>
                                    <span class="text-[10px] text-gray-600 uppercase">ID: #{{ $job->id }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center rounded-md bg-white/5 px-2 py-1 text-xs font-medium text-gray-300 ring-1 ring-inset ring-white/10">
                                    {{ $job->employer->user->phone_number ?? 'No Phone' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center gap-2">
                                    <span class="text-lg font-medium text-gray-400">No jobs available</span>
                                    <p class="text-sm text-gray-600">Try posting a new job to see it here.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Enhanced Mobile View -->
            <div class="grid grid-cols-1 divide-y divide-white/10 md:hidden">
                @forelse ($jobs as $job)
                    <div class="p-5 hover:bg-white/2">
                        <div class="flex items-center gap-4 mb-5">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-cyan-500/10 text-lg font-bold text-cyan-400 border border-cyan-500/20">
                                {{ strtoupper(substr($job->employer?->user?->name?? 'Deleted User' , 0, 1)) }}
                            </div>
                            <div class="flex flex-col">
                                <span class="text-base font-bold text-white">{{ $job->employer?->user?->name ?? 'Deleted User' }}</span>
                                <span class="text-xs text-cyan-500/80">{{ $job->title }}</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-y-4 text-sm">
                            <div class="flex flex-col gap-1">
                                <span class="text-[10px] uppercase tracking-tighter text-gray-500">Employer Email</span>
                                <span class="text-gray-300 break-all">{{ $job->employer?->user?->email ?? 'Deleted User Email' }}</span>
                            </div>
                            <div class="flex flex-col gap-1 text-right">
                                <span class="text-[10px] uppercase tracking-tighter text-gray-500">Phone</span>
                                <span class="text-gray-300">{{ $job->employer?->user?->phone_number ?? 'Deleted User Phone Number', 'N/A' }}</span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button class="w-full rounded-xl bg-white/5 py-3 text-sm font-bold text-white hover:bg-white/10 active:scale-[0.98] transition-all">
                                View Job Details
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-16 text-center text-gray-500">No jobs found.</div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>
