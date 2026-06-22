<x-layout>
    <div class="space-y-8">
        @if (session('success'))
            <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                {{ session('success') }}
            </div>
        @endif

        <!-- Header with Count -->
        <header class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-white">User Management</h1>
                <p class="mt-1 text-sm text-gray-400">A list of all users in your system including their name, email,
                    and phone.</p>
            </div>
            <div class="flex items-center gap-3">
                <span
                    class="rounded-full bg-cyan-500/10 px-3 py-1 text-xs font-medium text-cyan-400 border border-cyan-500/20">
                    {{ $users->total() }} Total Users
                </span>
            </div>
        </header>

        <!-- Main Container -->
        <div class="relative overflow-hidden rounded-2xl border border-white/10 bg-white/2 backdrop-blur-sm">

            <!-- Desktop/Tablet View -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full min-w-200 text-left text-sm text-white">
                    <thead>
                    <tr class="border-b border-white/10 bg-white/3 text-xs uppercase tracking-widest text-gray-400">
                        <th class="px-6 py-5 font-bold">ID</th>
                        <th class="px-6 py-5 font-bold">User Details</th>
                        <th class="px-6 py-5 font-bold">Role</th>
                        <th class="px-6 py-5 font-bold">National ID</th>
                        <th class="px-6 py-5 font-bold">Contact Info</th>
                        <th class="px-6 py-5 font-bold">Action</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                    @forelse ($users as $user)
                        <tr class="group hover:bg-white/4 transition-all duration-200">
                            <td class="px-6 py-4 text-gray-500 font-mono text-xs">
                                #{{ $user->id }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-linear-to-br from-cyan-500 to-blue-600 text-sm font-bold text-white shadow-lg shadow-cyan-500/20">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <span
                                        class="font-semibold text-gray-100 group-hover:text-cyan-400">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium border
                                    {{ $user->role === 'admin' ? 'bg-purple-500/10 text-purple-400 border-purple-500/20' :
                                       ($user->role === 'teacher' ? 'bg-cyan-500/10 text-cyan-400 border-cyan-500/20' :
                                        'bg-blue-500/10 text-blue-400 border-blue-500/20') }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-xs font-mono text-gray-400">
                                    {{ $user->national_id ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-400">
                                <div class="flex flex-col">
                                    <span>{{ $user->email }}</span>
                                    <span class="text-[10px] text-gray-600">{{ $user->phone_number }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                       class="inline-flex items-center rounded-lg bg-indigo-600 px-3 py-2 text-xs font-semibold text-white transition-colors hover:bg-indigo-500">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger bg-red-700 p-2 border-none rounded-lg cursor-pointer hover:bg-red-600 transition-colors" title="Delete user">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center gap-2">
                                    <span class="text-lg font-medium text-gray-400">No users available</span>
                                    <p class="text-sm text-gray-600">Try adding a new user to see them here.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-6 border-t border-white/10">
                {{ $users->links() }}
            </div>

            <!-- Enhanced Mobile View -->
            <div class="grid grid-cols-1 divide-y divide-white/10 md:hidden">
                @forelse ($users as $user)
                    <div class="p-5 hover:bg-white/2">
                        <div class="flex items-center gap-4 mb-5">
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-cyan-500/10 text-lg font-bold text-cyan-400 border border-cyan-500/20">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div class="flex flex-col">
                                <span class="text-base font-bold text-white">{{ $user->name }}</span>
                                <span class="text-xs text-gray-500">{{ ucfirst($user->role) }}</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-y-4 text-sm">
                            <div class="flex flex-col gap-1">
                                <span class="text-[10px] uppercase tracking-tighter text-gray-500">Email Address</span>
                                <span class="text-gray-300 break-all">{{ $user->email }}</span>
                            </div>
                            <div class="flex flex-col gap-1 text-right">
                                <span class="text-[10px] uppercase tracking-tighter text-gray-500">Phone</span>
                                <span class="text-gray-300">{{ $user->phone_number ?? 'N/A' }}</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-[10px] uppercase tracking-tighter text-gray-500">National ID</span>
                                <span class="text-gray-300">{{ $user->national_id ?? 'N/A' }}</span>
                            </div>
                            <div class="flex flex-col gap-1 text-right">
                                <span class="text-[10px] uppercase tracking-tighter text-gray-500">ID</span>
                                <span class="text-gray-300">#{{ $user->id }}</span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                   class="inline-flex items-center rounded-lg bg-indigo-600 px-3 py-2 text-xs font-semibold text-white transition-colors hover:bg-indigo-500">
                                    Edit
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger bg-red-700 border-none rounded-lg p-2 cursor-pointer hover:bg-red-600 transition-colors" type="submit" title="Delete user">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-16 text-center text-gray-500">No users found.</div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>
