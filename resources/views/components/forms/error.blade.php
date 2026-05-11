@props(['error' => false])

@if ($error)
    <p class="mt-1 text-xs text-red-500 sm:text-sm">{{ $error }}</p>
@endif
