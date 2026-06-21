<x-layout>
    <!-- Main Profile Content Area -->
    <main class="max-w-6xl mx-auto py-10 px-4">

        <!-- User Info Header Section -->
        <section class="bg-white/5 border border-white/10 rounded-2xl p-6 mb-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-white mb-1">{{ $user->name }}</h1>
                <p class="text-white/60 text-sm mb-2">{{ $user->email }}</p>
                @if($user->employer)
                    <div class="inline-flex items-center gap-2 bg-cyan-400/10 text-cyan-400 text-xs px-3 py-1 rounded-full border border-cyan-400/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        {{ $user->employer->name ?? 'Employer Profile' }}
                    </div>
                @endif
            </div>

            <a href="/jobs/create" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-xl transition duration-200 shadow-lg text-sm">
                + Post Another Job
            </a>
        </section>

        <!-- Jobs Header -->
        <div class="flex items-center justify-between border-b border-white/10 pb-4 mb-6">
            <h3 class="text-xl font-bold text-white tracking-wide">Jobs Posted by Your Company</h3>
            <span class="bg-white/10 text-white text-xs font-bold px-2.5 py-1 rounded-md">
                {{ count($jobs) }} Total
            </span>
        </div>

        <!-- Jobs List Layout -->
        <div class="grid gap-4 md:grid-cols-2">
            @forelse ($jobs as $job)
                <div class="bg-white/5 border border-white/10 hover:border-cyan-400/50 transition-all duration-300 rounded-xl p-5 flex flex-col justify-between group">
                    <div>
                        <!-- Title & Status Container -->
                        <div class="flex justify-between items-start gap-4 mb-3">
                            <h4 class="text-lg font-bold text-white group-hover:text-cyan-400 transition-colors duration-200 flex-1">
                                {{ $job->title }}
                            </h4>
                            
                            <!-- Dynamic Status Badge -->
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium tracking-wide border whitespace-nowrap
                                {{ $job->status === 'pending' ? 'bg-amber-500/10 text-amber-400 border-amber-500/20' : '' }}
                                {{ in_array($job->status, ['active', 'approved']) ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : '' }}
                                {{ !in_array($job->status, ['pending', 'active', 'approved']) ? 'bg-white/5 text-white/60 border-white/10' : '' }}">
                                
                                <!-- Status Indicator Dot -->
                                <span class="h-1.5 w-1.5 rounded-full 
                                    {{ $job->status === 'pending' ? 'bg-amber-400 animate-pulse' : '' }}
                                    {{ in_array($job->status, ['active', 'approved']) ? 'bg-emerald-400' : '' }}
                                    {{ !in_array($job->status, ['pending', 'active', 'approved']) ? 'bg-white/40' : '' }}">
                                </span>
                                
                                {{ ucfirst($job->status) }}
                            </span>
                        </div>
                        
                        <p class="text-white/70 text-sm leading-relaxed mb-4">
                            {{ Str::limit($job->salary, 120) }}
                        </p>
                    </div>

                    <!-- Card Footer Actions -->
                    <div class="flex items-center justify-between border-t border-white/5 pt-4 mt-auto">
                        <span class="text-xs text-white/40">
                            Posted {{ $job->created_at->diffForHumans() }}
                        </span>

                        <div class="flex items-center gap-3 text-sm">
                            <form action="/jobs/{{ $job->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400 transition duration-150 cursor-pointer">
                                    Delete
                                </button>
                            </form>
                            <a href="/jobs/{{ $job->id }}/edit" class="text-cyan-400 hover:text-cyan-300 font-medium transition duration-150">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full border border-dashed border-white/20 rounded-xl p-10 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-white/20 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <p class="text-white/60 mb-4">Your company hasn't posted any job openings yet.</p>
                    <a href="/jobs/create" class="inline-block bg-white/10 hover:bg-white/20 text-white text-sm font-semibold px-4 py-2 rounded-lg transition duration-150">
                        Post Your First Job
                    </a>
                </div>
            @endforelse
        </div>
    </main>
</x-layout>