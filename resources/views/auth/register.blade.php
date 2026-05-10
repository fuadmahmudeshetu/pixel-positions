<x-layout>
    <x-page-heading>
        Register
    </x-page-heading>

    <x-forms.form method="POST" action="/register" enctype="multipart/form-data">

        <x-forms.input label="Name" name="name" placeholder="John Doe" />

        <x-forms.input label="Email" name="email" type="email" placeholder="you@example.com" />

        <x-forms.input label="Password" name="password" type="password" placeholder="••••••••" />

        <x-forms.input label="Confirm Password" name="password_confirmation" type="password" placeholder="••••••••" />

        <x-forms.divider />

            <x-forms.input label="Employer" name="employer" placeholder="Company Name" />

            <x-forms.input label="Logo" name="logo" type="file"/>

        <x-forms.button>Create Account</x-forms.button>
    </x-forms.form>
</x-layout>