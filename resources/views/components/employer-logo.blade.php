@props(['employer' => null, 'width' => 90])

@php
    $src = Vite::asset('resources/images/default-profile.svg');
@endphp

<img src="{{ $src }}" alt="{{ $employer?->name ?? '' }}" {{ $attributes->merge(['class' => 'rounded-xl']) }} width="{{ $width }}" height="{{ $width }}">