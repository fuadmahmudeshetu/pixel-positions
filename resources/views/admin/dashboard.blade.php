<x-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Dashboard Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Card 1: Jobs -->
            <div class="bg-black rounded-xl text-white shadow-lg border border-zinc-800 p-6 flex items-center justify-between hover:border-zinc-700 transition duration-200">
                <div>
                    <p class="text-xs font-semibold text-zinc-400 uppercase tracking-widest">
                        Total Jobs
                    </p>
                    <p class="mt-2 text-4xl font-extrabold text-white tracking-tight">
                        {{ $jobs }}
                    </p>
                </div>
                <div class="p-3 bg-zinc-900 border border-zinc-800 rounded-xl text-zinc-400">
                    <svg xmlns="http://w3.org" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.214.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A47.479 47.479 0 0 1 12 15.75c-2.648 0-5.195-.16-7.663-.469a2.18 2.18 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.488V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                    </svg>
                </div>
            </div>

            <!-- Card 2: Users -->
            <div class="bg-black rounded-xl text-white shadow-lg border border-zinc-800 p-6 flex items-center justify-between hover:border-zinc-700 transition duration-200">
                <div>
                    <p class="text-xs font-semibold text-zinc-400 uppercase tracking-widest">
                        Total Users
                    </p>
                    <p class="mt-2 text-4xl font-extrabold text-white tracking-tight">
                        {{ $users }}
                    </p>
                </div>
                <div class="p-3 bg-zinc-900 border border-zinc-800 rounded-xl text-zinc-400">
                    <svg xmlns="http://w3.org" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                </div>
            </div>

            <!-- Card 3: Employers -->
            <div class="bg-black rounded-xl text-white shadow-lg border border-zinc-800 p-6 flex items-center justify-between hover:border-zinc-700 transition duration-200">
                <div>
                    <p class="text-xs font-semibold text-zinc-400 uppercase tracking-widest">
                        Total Employers
                    </p>
                    <p class="mt-2 text-4xl font-extrabold text-white tracking-tight">
                        {{ $employers }}
                    </p>
                </div>
                <div class="p-3 bg-zinc-900 border border-zinc-800 rounded-xl text-zinc-400">
                    <svg xmlns="http://w3.org" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 16.5h1.5m3 0H15" />
                    </svg>
                </div>
            </div>

        </div>
    </div>
</x-layout>
