<x-layout>
    <x-page-heading>
        Login
    </x-page-heading>

    <x-forms.form method="POST" action="{{ route('login.store') }}" enctype="multipart/form-data">

        <x-forms.input label="Email" name="email" type="email" placeholder="you@example.com" />

        <x-forms.input label="Password" name="password" type="password" placeholder="••••••••" />

        <div class="flex flex-col items-center gap-4 mt-2 sm:flex-row sm:justify-between">
            <x-forms.button>Login</x-forms.button>

            <!-- Sign Up redirect functionality -->
            <p class="text-sm text-white/60">
                ከዚህ በፊት አካውንት አልከፈቱም?
                <a href="{{ route('register') }}" class="font-semibold text-cyan-400 hover:text-cyan-300 hover:underline transition-colors">
                    ለመክፈት
                </a>
            </p>
        </div>
    </x-forms.form>
</x-layout>
