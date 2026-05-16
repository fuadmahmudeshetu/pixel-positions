<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <title>Pixel Positions</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-black pb-0">

    <div class="px-4 text-white sm:px-6 lg:px-10">
        <x-navbar />

        <main class="mx-auto mt-10 max-w-6xl">
            {{ $slot }}
        </main>

        <x-footer />
    </div>
</body>

</html>
