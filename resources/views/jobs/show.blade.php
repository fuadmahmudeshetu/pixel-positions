<x-layout>
    <div class="space-y-10">
        <section class="text-center">
            <h1 class="text-4xl font-bold">{{ $job->title }}</h1>
            <p class="text-lg text-white/60 mt-2">{{ $job->employer->name }} - {{ $job->location }}</p>
        </section>

        <x-panel class="max-w-4xl mx-auto p-10">
            <div class="flex flex-col md:flex-row gap-10">
                <div class="flex-1 space-y-6">
                    <div>
                        <h2 class="text-xl font-bold mb-2">Job Description</h2>
                        <div class="text-white/80 leading-relaxed whitespace-pre-line">
                            {{ $job->description ?: 'No description provided.' }}
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 border-t border-white/10 pt-6">
                        <div>
                            <h3 class="font-bold text-white/50 uppercase text-xs">Salary</h3>
                            <p>{{ $job->salary }}</p>
                        </div>
                        <div>
                            <h3 class="font-bold text-white/50 uppercase text-xs">Schedule</h3>
                            <p>{{ ucfirst($job->schedule) }}</p>
                        </div>
                        <div>
                            <h3 class="font-bold text-white/50 uppercase text-xs">Teaching Mode</h3>
                            <p>{{ $job->teaching_mode }}</p>
                        </div>
                        <div>
                            <h3 class="font-bold text-white/50 uppercase text-xs">Gender Preference</h3>
                            <p>{{ $job->gender_preference }}</p>
                        </div>
                    </div>

                    <div class="border-t border-white/10 pt-6">
                        <h3 class="font-bold text-white/50 uppercase text-xs mb-2">Tags</h3>
                        <div class="flex gap-2 flex-wrap">
                            @foreach($job->tags as $tag)
                                <x-tag :$tag />
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/3 space-y-6">
                    <div class="bg-white/5 p-6 rounded-xl border border-white/10 text-center">
                        <x-employer-logo :employer="$job->employer" :width="100" class="block mx-auto mb-4" />
                        <h3 class="font-bold text-lg">{{ $job->employer->name }}</h3>
                        <p class="text-sm text-white/60">Posted {{ $job->created_at->diffForHumans() }}</p>
                        
                        <div class="mt-6 space-y-3">
                             <a href="{{ $job->url }}" target="_blank" class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg transition">
                                Visit Website
                             </a>
                             
                             @if($job->employer->user?->phone_number)
                                <a href="tel:{{ $job->employer->user->phone_number }}" class="block w-full border border-white/20 hover:bg-white/5 text-white font-bold py-3 rounded-lg transition">
                                    Call Teacher
                                </a>
                                
                                @php
                                    $waNumber = preg_replace('/[^0-9]/', '', $job->employer->user->phone_number);
                                    if (str_starts_with($waNumber, '0')) {
                                        $waNumber = '251' . substr($waNumber, 1);
                                    }
                                @endphp
                                <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="block w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-lg transition">
                                    WhatsApp
                                </a>
                             @endif
                        </div>
                    </div>

                    @auth
                        <form action="{{ route('jobs.bookmark', $job->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 rounded-lg border border-white/20 hover:bg-white/5 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ Auth::user()->bookmarks->contains($job->id) ? 'text-yellow-500 fill-current' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                </svg>
                                {{ Auth::user()->bookmarks->contains($job->id) ? 'Saved' : 'Save for later' }}
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </x-panel>
    </div>
</x-layout>
