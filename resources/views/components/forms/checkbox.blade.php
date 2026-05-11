@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'checkbox',
        'id' => $name,
        'name' => $name,
        'value' => old($name)
    ];
@endphp

<x-forms.field :$label :$name>
    <div class="flex w-full items-start gap-3 rounded-xl border border-white/10 bg-white/10 px-4 py-3 sm:px-5 sm:py-4">
        <input {{ $attributes($defaults) }} class="mt-1 shrink-0">
        <span class="text-sm leading-6 sm:text-base">{{ $label }}</span>
    </div>
</x-forms.field>

