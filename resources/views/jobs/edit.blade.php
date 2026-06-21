<x-layout>
    <div class="max-w-md mx-auto bg-[#121212] text-gray-200 p-6 rounded-xl shadow-md border border-gray-800">

        <div class="mb-6">
            <label class="text-xs uppercase tracking-wider text-gray-500">Employer</label>
            <div class="text-lg font-medium text-gray-400 mt-1">{{ $job->employer->name ?? 'NoorLearning' }}</div>
        </div>

        <hr class="border-gray-800 mb-6">

        <form action="{{ route('jobs.update', $job->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-400">Job Title / Required Service</label>
                <input type="text" name="title" id="title"
                       value="{{ old('title', $job->title) }}"
                       class="w-full mt-1 p-2.5 bg-[#1e1e1e] border border-gray-700 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="e.g., ቁርአን አቅሪ" required>
                @error('title') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="location" class="block text-sm font-medium text-gray-400">Location</label>
                <input type="text" name="location" id="location"
                       value="{{ old('location', $job->location) }}"
                       class="w-full mt-1 p-2.5 bg-[#1e1e1e] border border-gray-700 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="e.g., Addis Ababa, Furi" required>
                @error('location') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="salary" class="block text-sm font-medium text-gray-400">Budget / Salary (ETB)</label>
                <input type="text" name="salary" id="salary"
                       value="{{ old('salary', $job->salary) }}"
                       class="w-full mt-1 p-2.5 bg-[#1e1e1e] border border-gray-700 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="e.g., 4000" required>
                @error('salary') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-400">Contact Phone Number</label>
                <input type="text" name="phone" id="phone"
                       value="{{ old('phone', $job->employer->user->phone_number) }}"
                       class="w-full mt-1 p-2.5 bg-[#1e1e1e] border border-gray-700 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="e.g., 0926000069" required>
                @error('phone') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="tags" class="block text-sm font-medium text-gray-400">Tags (comma separated)</label>
                <input type="text" name="tags" id="tags"
                       value="{{ old('tags', $job->tags->implode('name', ', ')) }}"
                       class="w-full mt-1 p-2.5 bg-[#1e1e1e] border border-gray-700 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="e.g., quran, hadith">
                @error('tags') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="pt-4 flex gap-2">
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-4 rounded-lg transition duration-200">
                    Save Changes
                </button>
                <a href="{{ route('jobs.index') }}" class="px-4 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-lg text-center transition duration-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-layout>
