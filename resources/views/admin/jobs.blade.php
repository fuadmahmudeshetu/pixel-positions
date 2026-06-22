<x-layout>
    <div class="space-y-8">
        <!-- Header with Count -->
        <header class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-white">Jobs Management</h1>
                <p class="mt-1 text-sm text-gray-400">A list of all active job postings</p>
            </div>
            <div class="flex items-center gap-3">
                <span
                    class="rounded-full bg-cyan-500/10 px-3 py-1 text-xs font-medium text-cyan-400 border border-cyan-500/20">
                    {{ $jobs->total() }} Total Jobs
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
                        <th class="px-6 py-5 font-bold">Status</th>
                        <th class="px-6 py-5 font-bold">Action</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                    @forelse ($jobs as $job)
                        <tr class="group hover:bg-white/4 transition-all duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-linear-to-br from-cyan-500 to-blue-600 text-sm font-bold text-white shadow-lg shadow-cyan-500/20">
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
                                <span
                                    class="inline-flex items-center rounded-md bg-white/5 px-2 py-1 text-xs font-medium text-gray-300 ring-1 ring-inset ring-white/10">
                                    {{ $job->employer->user->phone_number ?? 'No Phone' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $statusClasses = [
                                        'pending' => 'bg-amber-500/10 text-amber-400 border-amber-500/20',
                                        'approved' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20',
                                        'rejected' => 'bg-red-500/10 text-red-400 border-red-500/20',
                                    ];
                                    $currentStatus = $job->status ?? ($job->is_approved ? 'approved' : 'pending');
                                @endphp
                                <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-medium {{ $statusClasses[$currentStatus] ?? $statusClasses['pending'] }}">
                                    {{ ucfirst($currentStatus) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <form action="{{ route('admin.jobs.approve', $job->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="px-3 py-1 rounded text-white text-xs font-semibold transition-colors
                                            {{ $job->status === 'approved' ? 'bg-gray-500 cursor-not-allowed' : 'bg-emerald-600 hover:bg-emerald-700 shadow-lg shadow-emerald-500/20' }}"
                                            {{ $job->status === 'approved' ? 'disabled' : '' }}
                                        >
                                            Approve
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.jobs.reject', $job->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="px-3 py-1 rounded text-white text-xs font-semibold transition-colors
                                            {{ $job->status === 'rejected' ? 'bg-gray-500 cursor-not-allowed' : 'bg-red-600 hover:bg-red-700 shadow-lg shadow-red-500/20' }}"
                                            {{ $job->status === 'rejected' ? 'disabled' : '' }}
                                        >
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-20 text-center">
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

            <div class="p-6 border-t border-white/10">
                {{ $jobs->links() }}
            </div>

            <!-- Enhanced Mobile View -->
            <div class="grid grid-cols-1 divide-y divide-white/10 md:hidden">
                @forelse ($jobs as $job)
                    <div class="p-5 hover:bg-white/2">
                        <div class="flex items-center gap-4 mb-5">
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-cyan-500/10 text-lg font-bold text-cyan-400 border border-cyan-500/20">
                                {{ strtoupper(substr($job->employer?->user?->name?? 'Deleted User' , 0, 1)) }}
                            </div>
                            <div class="flex flex-col">
                                <span
                                    class="text-base font-bold text-white">{{ $job->employer?->user?->name ?? 'Deleted User' }}</span>
                                <span class="text-xs text-cyan-500/80">{{ $job->title }}</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-y-4 text-sm">
                            <div class="flex flex-col gap-1">
                                <span class="text-[10px] uppercase tracking-tighter text-gray-500">Employer Email</span>
                                <span
                                    class="text-gray-300 break-all">{{ $job->employer?->user?->email ?? 'Deleted User Email' }}</span>
                            </div>
                            <div class="flex flex-col gap-1 text-right">
                                <span class="text-[10px] uppercase tracking-tighter text-gray-500">Phone</span>
                                <span
                                    class="text-gray-300">{{ $job->employer?->user?->phone_number ?? 'Deleted User Phone Number', 'N/A' }}</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-[10px] uppercase tracking-tighter text-gray-500">Status</span>
                                @php
                                    $currentStatus = $job->status ?? ($job->is_approved ? 'approved' : 'pending');
                                @endphp
                                <span class="inline-flex items-center w-fit rounded-full border px-2 py-0.5 text-[10px] font-medium {{ $statusClasses[$currentStatus] ?? $statusClasses['pending'] }}">
                                    {{ ucfirst($currentStatus) }}
                                </span>
                            </div>
                        </div>

                        <div class="flex justify-center gap-3 items-end mt-5">
                            <form action="{{ route('admin.jobs.approve', $job->id) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="px-4 py-2 rounded text-white text-xs font-bold transition-all
                                        {{ $job->status === 'approved' ? 'bg-gray-500 cursor-not-allowed' : 'bg-emerald-600 active:scale-95 shadow-lg shadow-emerald-500/20' }}"
                                    {{ $job->status === 'approved' ? 'disabled' : '' }}
                                >
                                    Approve
                                </button>
                            </form>

                            <form action="{{ route('admin.jobs.reject', $job->id) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="px-4 py-2 rounded text-white text-xs font-bold transition-all
                                        {{ $job->status === 'rejected' ? 'bg-gray-500 cursor-not-allowed' : 'bg-red-600 active:scale-95 shadow-lg shadow-red-500/20' }}"
                                    {{ $job->status === 'rejected' ? 'disabled' : '' }}
                                >
                                    Reject
                                </button>
                            </form>
                        </div>

                    </div>
                @empty
                    <div class="px-6 py-16 text-center text-gray-500">No jobs found.</div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>
