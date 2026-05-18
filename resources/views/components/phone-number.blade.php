@props(['job'])

@php

$phoneNumber = $job->employer?->user?->phone_number;
$formattedNumber = $phoneNumber ? ltrim($phoneNumber, '0') : null;

@endphp

@if(!$phoneNumber)
    <div class="flex items-center gap-4">
        <span>N/A</span>
    </div>
@else

<div class="flex items-center gap-4"
     x-data="{
        show: false,
        isLoggedIn: {{ Auth::check() ? 'true' : 'false' }}
     }">

    <a>
        <template x-if="!show">
            <span>{{ Str::mask($phoneNumber, '*', 4, -2) }}</span>
        </template>

        <template x-if="show">
            <span>{{ $phoneNumber }}</span>
        </template>
    </a>

    <button
        type="button"
        @click="isLoggedIn ? show = !show : window.location.href = '{{ route('login') }}'"
        class="text-xs font-semibold text-indigo-600 dark:text-indigo-400 hover:underline focus:outline-none"
        x-text="show ? 'Hide' : 'See'"
    >
    </button>

</div>
@endif
