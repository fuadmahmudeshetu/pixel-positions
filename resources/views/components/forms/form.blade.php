<form {{ $attributes(["class" => "mx-auto w-full max-w-2xl space-y-4 sm:space-y-6 px-3 sm:px-0", "method" => "GET"]) }}>
    @if ($attributes->get('method', 'GET') !== 'GET')
        @csrf
        @method($attributes->get('method'))
    @endif

    {{ $slot }}
</form>
