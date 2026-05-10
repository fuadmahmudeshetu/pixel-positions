<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <title>Pixel Positions</title>
</head>
<body class="bg-black">
    
    <div class="px-10 text-white">
        <nav class="flex justify-between items-center py-4 border-b border-white/10">
            <div class="">
                <a href="">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Pixel Positions Logo" class="w-24">
                </a>
            </div>

            <div class="space-x-6 font-bold">
                <a href="#">Jobs</a>
                <a href="#">Careers</a>
                <a href="#">Salaries</a>
                <a href="#">Companies</a>
            </div>

            <div class="">
                <a href="#">Post a job</a>
            </div>
        </nav>

        <main class="mt-10 mx-w-[986px]">
            {{ $slot }}
        </main>
    </div>


</body>
</html>