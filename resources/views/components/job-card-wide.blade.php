<x-panel class="flex flex-col gap-4 p-4 sm:p-5">
    <div class="flex flex-1 flex-col">

        <a href="#" class="self-start text-xs text-gray-400 sm:text-sm">{{ $job->employer->name }}</a>

        <h3 class="text-lg font-bold leading-snug transition-colors duration-300 group-hover:text-blue-800 sm:text-xl">
            <a href="{{ $job->url }}" class="underline decoration-white/40 underline-offset-4 hover:decoration-white"
               target="_blank" rel="noopener noreferrer">
                {{ $job->title }}
            </a>
        </h3>

        <!-- Change: Added flex-wrap and adjusted margin -->
        <div class="mt-4 flex flex-wrap items-center justify-between gap-y-4 md:mt-auto">
            <p class="text-sm text-white/75">Full Time - From {{ $job->salary }}</p>

            <!-- Change: Changed justify-end to justify-start for small screens, back to end for md+ -->
            <div class="flex items-center justify-start md:justify-end gap-2 flex-wrap">
                @foreach($job->tags as $tag)
                    <x-tag :$tag></x-tag>
                @endforeach

                <div class="ml-auto md:ml-6 items-end md:mx-4 shrink-0">
                    <x-employer-logo :width="48"/>
                </div>
            </div>
        </div>
    </div>
</x-panel>
