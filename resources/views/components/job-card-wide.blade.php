@props(['job'])

<x-panel class="flex gap-x-6">
    <div class="">
        <x-employer-logo />
    </div>
    <div class="flex-1 flex flex-col">

        <a href="#" class="self-start text-gray-400 text-sm">{{ $job->employer->name }}</a>

        <h3 class="font-bold text-xl group-hover:text-blue-800 transition-colors duration-300">
            <a href="{{ $job->url }}" class="text-decoration: underline;" target="_blank">
                {{ $job->title }}
            </a>
        </h3>

        <p class="mt-auto">Full Time - From {{ $job->salary }}</p>

    </div>

    <div class="gap-2">
        @foreach($job->tags as $tag)
        <x-tag :$tag></x-tag>
        @endforeach
    </div>
</x-panel>