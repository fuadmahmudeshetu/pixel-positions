@props(['tag','size' => 'base'])

@php

$classes = 'inline-flex max-w-full items-center justify-center whitespace-nowrap rounded-full bg-white/10 font-bold leading-none transition-colors duration-300 hover:bg-white/25';

if ($size === 'base') {
    $classes .= ' px-2.5 py-1 text-[10px] sm:px-3.5 sm:py-1.5 sm:text-xs lg:px-4 lg:py-2 lg:text-sm';
}

if ($size === 'small') {
    $classes .= ' px-2 py-1 text-[9px] sm:px-2.5 sm:py-1 sm:text-[10px] lg:px-3 lg:py-1.5 lg:text-xs';
}

@endphp

<a href="/tags/{{ strtolower($tag->name) }}" class="{{ $classes }}">
    {{ $tag->name }}
</a>