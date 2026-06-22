<x-layout>
    <div class="space-y-10">
        <section class="text-center bg-white/5 p-10 rounded-2xl border border-white/10 relative overflow-hidden">
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-blue-500/5 rounded-full blur-3xl"></div>
            
            <div class="relative">
                <x-employer-logo :employer="$employer" :width="120" class="block mx-auto mb-6 shadow-2xl" />
                <h1 class="text-4xl font-bold text-white">{{ $employer->name }}</h1>
                <p class="text-white/50 mt-2">Member since {{ $employer->created_at->format('M Y') }}</p>
                
                @if($employer->user?->phone_number)
                    <div class="mt-6 flex justify-center gap-4">
                        <a href="tel:{{ $employer->user->phone_number }}" class="bg-white/10 hover:bg-white/20 text-white px-6 py-2 rounded-lg transition text-sm font-bold">
                            Call
                        </a>
                        @php
                            $waNumber = preg_replace('/[^0-9]/', '', $employer->user->phone_number);
                            if (str_starts_with($waNumber, '0')) {
                                $waNumber = '251' . substr($waNumber, 1);
                            }
                        @endphp
                        <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition text-sm font-bold">
                            WhatsApp
                        </a>
                    </div>
                @endif
            </div>
        </section>

        <section>
            <x-section-heading>Jobs by {{ $employer->name }}</x-section-heading>
            
            <div class="mt-6 space-y-6">
                @forelse($jobs as $job)
                    <x-job-card-wide :$job />
                @empty
                    <p class="text-center text-white/40 py-10">No active job listings found.</p>
                @endforelse
                
                <div class="mt-8">
                    {{ $jobs->links() }}
                </div>
            </div>
        </section>
    </div>
</x-layout>
