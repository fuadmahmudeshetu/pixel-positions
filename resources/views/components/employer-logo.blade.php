@props(['employer' => null, 'width' => 90])

@php
    $src = $employer && $employer->logo
        ? (str_starts_with($employer->logo, 'http') ? $employer->logo : asset('storage/' . $employer->logo))
        : "https://picsum.photos/seed/" . rand(0, 10000) . "/" . $width;
@endphp

<img src="{{ $src }}" alt="{{ $employer?->name ?? '' }}" {{ $attributes->merge(['class' => 'rounded-xl']) }} width="{{ $width }}">