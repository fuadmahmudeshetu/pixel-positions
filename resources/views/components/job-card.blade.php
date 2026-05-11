@props(['job'])

<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm">{{ $job->employer->name }}</div>

    <div class="p-8">
        <h3 class="group-hover:text-blue-800 text-xl font-bold transition-colors duration-300">
            <a href="{{ $job->url }}" class="text-decoration: underline;" target="_blank">
                {{ $job->title }}
            </a>
        </h3>
        <p class="text-sm mt-4">Full Time - From {{ $job->salary }}</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div class="">
            @foreach($job->tags as $tag)
                <x-tag :$tag size="small">Laravel</x-tag>
            @endforeach
        </div>

        <x-employer-logo :width="42"/>
    </div>
</x-panel>