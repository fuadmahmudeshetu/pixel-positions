@props(['employer' => null, 'width' => 90])

@php
    $src = $employer && $employer->logo
        ? (str_starts_with($employer->logo, 'http') ? $employer->logo : asset('storage/' . $employer->logo))
        : "https://via.placeholder.com/" . $width . "?text=" . urlencode(substr($employer?->name ?? 'Logo', 0, 2));
@endphp

<img src="{{ $src }}" alt="{{ $employer?->name ?? '' }}" {{ $attributes->merge(['class' => 'rounded-xl']) }} width="{{ $width }}">