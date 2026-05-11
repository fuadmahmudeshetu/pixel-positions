@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'w-full rounded-xl border border-white/10 bg-white/10 px-4 py-3 text-sm sm:px-5 sm:py-4 sm:text-base',
        'value' => old($name)
    ];
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }}>
</x-forms.field>

