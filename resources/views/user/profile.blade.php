<x-layout>
    <main class="max-w-6xl mx-auto px-4 py-8 md:py-12">
        <!-- Profile Header -->
        <section class="relative overflow-hidden bg-gradient-to-br from-white/5 to-white/10 border border-white/10 rounded-2xl p-6 md:p-8 mb-8 md:mb-12">
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-cyan-400/5 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-32 -left-32 w-80 h-80 bg-blue-500/5 rounded-full blur-3xl"></div>
            
            <div class="relative flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex items-center gap-5">
                    <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-gradient-to-br from-cyan-400/20 to-blue-500/20 border-2 border-cyan-400/30 flex items-center justify-center text-2xl md:text-3xl font-bold text-cyan-400 flex-shrink-0">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-white mb-1">{{ $user->name }}</h1>
                        <p class="text-white/50 text-sm">{{ $user->email }}</p>
                        @if($user->employer)
                            <span class="inline-flex items-center gap-1.5 mt-2 text-xs text-cyan-400 bg-cyan-400/10 px-3 py-1 rounded-full border border-cyan-400/20">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                {{ $user->employer->name ?? 'Employer Profile' }}
                            </span>
                        @endif
                    </div>
                </div>
                <a href="/jobs/create" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 shadow-lg shadow-blue-500/20 hover:shadow-blue-500/40 text-sm md:text-base whitespace-nowrap">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Post Another Job
                </a>
            </div>
        </section>

        <!-- Jobs Header -->
        <div class="flex items-center justify-between gap-4 border-b border-white/10 pb-4 mb-6">
            <div>
                <h2 class="text-xl md:text-2xl font-bold text-white tracking-wide">Your Job Postings</h2>
                <p class="text-white/40 text-sm mt-0.5">Manage all job listings from your company</p>
            </div>
            <span class="bg-white/10 text-white text-sm font-bold px-4 py-2 rounded-lg border border-white/5">
                {{ count($jobs) }}
            </span>
        </div>

        <!-- Jobs Grid -->
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
            @forelse ($jobs as $job)
                <div class="group relative bg-white/5 border border-white/10 hover:border-cyan-400/40 rounded-xl p-5 transition-all duration-300 hover:shadow-lg hover:shadow-cyan-500/5 hover:-translate-y-1">
                    <div class="flex flex-col h-full">
                        <!-- Top Section -->
                        <div class="flex-1">
                            <div class="flex items-start justify-between gap-3 mb-3">
                                <h3 class="text-lg font-bold text-white group-hover:text-cyan-400 transition-colors duration-200 leading-tight">
                                    {{ $job->title }}
                                </h3>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium whitespace-nowrap border
                                    {{ $job->status === 'pending' ? 'bg-amber-500/10 text-amber-400 border-amber-500/20' : '' }}
                                    {{ in_array($job->status, ['active', 'approved']) ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : '' }}
                                    {{ $job->status === 'rejected' ? 'bg-red-500/10 text-red-400 border-red-500/20' : '' }}
                                    {{ !in_array($job->status, ['pending', 'active', 'approved', 'rejected']) ? 'bg-white/5 text-white/60 border-white/10' : '' }}">
                                    <span class="w-1.5 h-1.5 rounded-full 
                                        {{ $job->status === 'pending' ? 'bg-amber-400 animate-pulse' : '' }}
                                        {{ in_array($job->status, ['active', 'approved']) ? 'bg-emerald-400' : '' }}
                                        {{ $job->status === 'rejected' ? 'bg-red-400' : '' }}
                                        {{ !in_array($job->status, ['pending', 'active', 'approved', 'rejected']) ? 'bg-white/40' : '' }}">
                                    </span>
                                    {{ ucfirst($job->status) }}
                                </span>
                            </div>
                            <p class="text-white/60 text-sm leading-relaxed mb-4 line-clamp-2">
                                {{ Str::limit($job->salary, 100) }}
                            </p>
                        </div>

                        <!-- Bottom Section -->
                        <div class="flex items-center justify-between pt-4 border-t border-white/5 mt-auto">
                            <span class="text-xs text-white/30">
                                {{ $job->created_at->diffForHumans() }}
                            </span>
                            <div class="flex items-center gap-3">
                                <form action="/jobs/{{ $job->id }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white/40 hover:text-red-400 transition-colors duration-200 text-sm font-medium">
                                        Delete
                                    </button>
                                </form>
                                <a href="/jobs/{{ $job->id }}/edit" class="text-white/40 hover:text-cyan-400 transition-colors duration-200 text-sm font-medium">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="md:col-span-2 lg:col-span-2 xl:col-span-2 border-2 border-dashed border-white/10 rounded-2xl p-12 text-center">
                    <div class="max-w-sm mx-auto">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-white/5 flex items-center justify-center">
                            <svg class="w-8 h-8 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h3 class="text-white/60 font-medium mb-2">No jobs posted yet</h3>
                        <p class="text-white/40 text-sm mb-6">Your company hasn't posted any job openings yet.</p>
                        <a href="/jobs/create" class="inline-block bg-white/10 hover:bg-white/20 text-white text-sm font-semibold px-6 py-3 rounded-lg transition-all duration-200">
                            Post Your First Job
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </main>
</x-layout>