@props(['label', 'name'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'w-full rounded-xl border border-white/10 bg-black px-4 py-3 text-sm sm:px-5 sm:py-4 sm:text-base'
    ];
@endphp

<x-forms.field :$label :$name>
    <select {{ $attributes($defaults) }}>
        {{ $slot }}
    </select>
</x-forms.field>

