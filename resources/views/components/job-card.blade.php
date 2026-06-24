@props(['job'])

<x-panel class="group relative flex h-full flex-col overflow-hidden rounded-2xl border border-white/10 bg-gradient-to-br from-white/5 to-white/10 p-4 text-left shadow-lg backdrop-blur-sm transition-all duration-300 hover:scale-[1.02] hover:border-cyan-400/40 hover:shadow-2xl hover:shadow-cyan-500/10 sm:p-5 lg:p-6">
    <!-- Subtle glow effect -->
    <div class="absolute -inset-1 -z-10 rounded-2xl bg-gradient-to-r from-cyan-400/20 to-blue-500/20 opacity-0 blur-xl transition-opacity duration-500 group-hover:opacity-100"></div>

    <!-- Employer & badge row -->
    <div class="flex items-start justify-between gap-3">
        <div class="self-start text-xs font-medium text-white/60 transition-colors duration-300 group-hover:text-cyan-300 sm:text-sm">
            @if($job->employer)
                <a href="{{ route('employers.show', $job->employer->id) }}" class="inline-flex items-center gap-1.5 hover:underline hover:underline-offset-2">
                    <span class="inline-block h-1.5 w-1.5 rounded-full bg-cyan-400/60"></span>
                    {{ $job->employer->name }}
                </a>
            @else
                <span class="text-white/40">Unknown Employer</span>
            @endif
        </div>

        <!-- status pill (optional) -->
        <span class="inline-flex items-center rounded-full bg-emerald-500/10 px-2.5 py-0.5 text-[10px] font-semibold uppercase tracking-wider text-emerald-300 ring-1 ring-emerald-500/20 backdrop-blur-sm sm:text-xs">
            Active
        </span>
    </div>

    <!-- Main content -->
    <div class="flex flex-1 flex-col py-4 sm:py-5 lg:py-6">
        <!-- Job title -->
        <h3 class="text-lg font-bold leading-tight text-white transition-colors duration-300 group-hover:text-cyan-300 sm:text-xl lg:text-2xl">
            <a href="{{ route('jobs.show', $job->id) }}" class="inline-block decoration-white/20 underline-offset-4 transition-all duration-300 hover:underline hover:decoration-cyan-400/70">
                {{ $job->title }}
            </a>
        </h3>

        <!-- Location & mode -->
        <div class="mt-2 flex flex-wrap items-center gap-x-3 gap-y-1 text-xs text-white/60 sm:mt-3 sm:text-sm">
            <span class="inline-flex items-center gap-1">
                <svg class="h-3 w-3 text-cyan-400/70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                {{ $job->location }}
            </span>
            <span class="h-1 w-1 rounded-full bg-white/20"></span>
            <span class="inline-flex items-center gap-1">
                <svg class="h-3 w-3 text-cyan-400/70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $job->teaching_mode }}
            </span>
        </div>

        <!-- Salary & gender -->
        <div class="mt-3 flex flex-wrap items-center gap-x-4 gap-y-1 text-sm font-light text-white/70 sm:mt-4">
            <span class="inline-flex items-center gap-1.5 rounded-full bg-white/5 px-3 py-0.5 text-xs font-medium text-emerald-300 ring-1 ring-white/10 backdrop-blur-sm sm:text-sm">
                <span class="text-emerald-400/60"></span> {{ $job->salary }}
            </span>
            <span class="inline-flex items-center gap-1.5 text-xs text-white/50">
                <span class="h-1.5 w-1.5 rounded-full bg-white/20"></span>
                {{ $job->gender_preference }}
            </span>
        </div>

        <!-- Phone number -->
        <div class="mt-3 text-xs text-white/40 sm:mt-4">
            <x-phone-number :job="$job" class="hover:text-cyan-300 transition-colors" />
        </div>

        <!-- Tags + Logo row -->
        <div class="mt-auto flex items-end justify-between gap-3 pt-4">
            <!-- Tags (scrollable on small screens) -->
            <div class="flex min-w-0 flex-1 items-center gap-1.5 overflow-x-auto pb-0.5 scrollbar-thin scrollbar-track-white/5 scrollbar-thumb-cyan-400/20">
                @foreach($job->tags as $tag)
                    <x-tag :$tag size="small" class="shrink-0 bg-white/5 px-2.5 py-0.5 text-[10px] font-medium text-white/70 ring-1 ring-white/10 backdrop-blur-sm transition-all duration-200 hover:bg-cyan-400/10 hover:text-cyan-300 hover:ring-cyan-400/30 sm:text-xs">
                        {{ $tag->name ?? 'Laravel' }}
                    </x-tag>
                @endforeach
            </div>

            <!-- Logo -->
            <div class="shrink-0 self-center transition-transform duration-300 group-hover:scale-110 group-hover:rotate-1">
                <x-employer-logo :employer="$job->employer" :width="42" class="rounded-xl border border-white/10 shadow-lg" />
            </div>
        </div>

        <!-- Footer: posted time -->
        <div class="mt-4 flex items-center justify-between border-t border-white/5 pt-3">
            <span class="flex items-center gap-1.5 text-[10px] text-white/30 sm:text-xs">
                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Posted {{ $job->created_at->diffForHumans() }}
            </span>
            <a href="{{ route('jobs.show', $job->id) }}" class="inline-flex items-center gap-1 text-xs font-medium text-cyan-400/60 transition-all duration-300 hover:text-cyan-300 hover:underline">
                View <span class="hidden sm:inline">details</span>
                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
</x-panel>
