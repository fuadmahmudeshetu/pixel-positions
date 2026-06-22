@props(['job'])

<x-panel class="flex h-full flex-col p-4 text-left sm:p-5">
    <div class="self-start text-xs text-white/70 sm:text-sm">
        @if($job->employer)
            <a href="{{ route('employers.show', $job->employer->id) }}" class="hover:underline">
                {{ $job->employer->name }}
            </a>
        @else
            Unknown Employer
        @endif
    </div>

    <div class="py-5 sm:py-7">
        <h3 class="text-lg font-bold leading-snug transition-colors duration-300 group-hover:text-blue-800 sm:text-xl">
            <a href="{{ route('jobs.show', $job->id) }}" class="underline decoration-white/40 underline-offset-4 hover:decoration-white">
                {{ $job->title }}
            </a>
        </h3>
        <p class="mt-3 text-xs text-white/75 sm:mt-4 sm:text-sm">{{ $job->location }} ({{ $job->teaching_mode }})</p>
        <p class="mt-2 text-sm">{{ $job->salary }} - {{ $job->gender_preference }}</p>

        <x-phone-number :job="$job"/>

        <div class="mt-auto flex items-center justify-between gap-3 pt-2">
            <div class="flex min-w-0 flex-1 items-center gap-2 overflow-x-auto whitespace-nowrap">
                @foreach($job->tags as $tag)
                    <x-tag :$tag size="small">Laravel</x-tag>
                @endforeach
            </div>

            <div class="shrink-0 self-center">
                <x-employer-logo :employer="$job->employer" :width="42"/>
            </div>
        </div>

        <div class="flex items-center justify-between border-t border-white/5 pt-4 mt-auto">
            <span class="text-xs text-white/40">
                Posted {{ $job->created_at->diffForHumans() }}
            </span>
        </div>
    </div>
</x-panel>
