<x-layout>
    <div class="mx-auto max-w-3xl space-y-6">
        <div class="flex items-center justify-between gap-3">
            <h1 class="text-2xl font-bold text-white">Edit User</h1>
            <a href="{{ route('admin.users.') }}"
               class="inline-flex items-center rounded-lg border border-white/20 px-3 py-2 text-xs font-semibold text-gray-200 transition-colors hover:bg-white/10">
                Back to users
            </a>
        </div>

        <div class="rounded-2xl border border-white/10 bg-white/2 p-6 backdrop-blur-sm">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PATCH')

                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-gray-300">Name</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name', $user->name) }}"
                        required
                        class="w-full rounded-lg border border-white/10 bg-black/20 px-4 py-2 text-white outline-none transition focus:border-cyan-500"
                    >
                    @error('name')
                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-gray-300">Email</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email', $user->email) }}"
                        required
                        class="w-full rounded-lg border border-white/10 bg-black/20 px-4 py-2 text-white outline-none transition focus:border-cyan-500"
                    >
                    @error('email')
                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone_number" class="mb-2 block text-sm font-medium text-gray-300">Phone Number</label>
                    <input
                        id="phone_number"
                        name="phone_number"
                        type="text"
                        value="{{ old('phone_number', $user->phone_number) }}"
                        class="w-full rounded-lg border border-white/10 bg-black/20 px-4 py-2 text-white outline-none transition focus:border-cyan-500"
                    >
                    @error('phone_number')
                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-2">
                    <button
                        type="submit"
                        class="inline-flex items-center rounded-lg bg-cyan-600 px-4 py-2 text-sm font-semibold text-white transition-colors hover:bg-cyan-500"
                    >
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
