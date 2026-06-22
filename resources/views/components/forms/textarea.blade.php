@props(['label', 'name', 'rows' => 5])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'w-full rounded-xl border border-white/10 bg-white/10 px-4 py-3 text-sm sm:px-5 sm:py-4 sm:text-base',
        'rows' => $rows
    ];
@endphp

<x-forms.field :$label :$name>
    <textarea {{ $attributes($defaults) }}>{{ $slot->isNotEmpty() ? $slot : old($name) }}</textarea>
</x-forms.field>
