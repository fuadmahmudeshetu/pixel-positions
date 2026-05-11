@props(['name', 'label'])

<div class="flex items-center gap-x-2 py-1 sm:py-2">
    <label class="break-words text-sm font-bold sm:text-base" for="{{ $name }}">{{ $label }}</label>
</div>
