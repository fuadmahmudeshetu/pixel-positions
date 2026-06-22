<x-forms.form action="{{ route('search') }}" {{ $attributes->merge(['class' => 'mt-5 sm:mt-6']) }} x-data="{ showFilters: {{ request()->hasAny(['location', 'schedule', 'teaching_mode', 'gender']) ? 'true' : 'false' }} }">
    <div class="relative mx-auto max-w-xl">
        <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35m1.35-5.15A7.5 7.5 0 1 1 3 11.5a7.5 7.5 0 0 1 15 0Z" />
        </svg>
        <x-forms.input :label="false" name="search" :value="request('search')" placeholder="Search teachers..." class="w-full max-w-full rounded-xl border-white/10 bg-white/5 py-3 pl-12 pr-4 sm:px-5 sm:py-4 sm:pl-12" />
        
        <button type="button" @click="showFilters = !showFilters" class="absolute right-3 top-1/2 -translate-y-1/2 text-white/40 hover:text-white transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
            </svg>
        </button>
    </div>

    <div x-show="showFilters" x-transition class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4 max-w-xl mx-auto text-left">
        <div>
            <label class="text-[10px] uppercase font-bold text-white/40 mb-1 block">Location</label>
            <input name="location" value="{{ request('location') }}" placeholder="e.g. Addis" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500 text-white">
        </div>
        <div>
            <label class="text-[10px] uppercase font-bold text-white/40 mb-1 block">Schedule</label>
            <select name="schedule" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500 text-white">
                <option value="">Any</option>
                <option value="full-time" {{ request('schedule') === 'full-time' ? 'selected' : '' }}>Full Time</option>
                <option value="part-time" {{ request('schedule') === 'part-time' ? 'selected' : '' }}>Part Time</option>
            </select>
        </div>
        <div>
            <label class="text-[10px] uppercase font-bold text-white/40 mb-1 block">Mode</label>
            <select name="teaching_mode" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500 text-white">
                <option value="">Any</option>
                <option value="In-person" {{ request('teaching_mode') === 'In-person' ? 'selected' : '' }}>In-person</option>
                <option value="Online" {{ request('teaching_mode') === 'Online' ? 'selected' : '' }}>Online</option>
                <option value="Hybrid" {{ request('teaching_mode') === 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
            </select>
        </div>
        <div>
            <label class="text-[10px] uppercase font-bold text-white/40 mb-1 block">Gender</label>
            <select name="gender" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500 text-white">
                <option value="">Any</option>
                <option value="Male" {{ request('gender') === 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ request('gender') === 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
    </div>
</x-forms.form>
