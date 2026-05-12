<x-layout>
    <x-page-heading>
        Register
    </x-page-heading>

    <x-forms.form method="POST" action="/register" enctype="multipart/form-data">

        <x-forms.input label="Name" name="name" placeholder="John Doe" />

        <x-forms.input label="Phone Number ( WhatsApp )" name="phone_number" placeholder="+251/0912345678" />

        <x-forms.input label="National ID (FAN)" name="national_id" placeholder="123456789" />

        <x-forms.input label="Email" name="email" type="email" placeholder="you@example.com" />

        <x-forms.input label="Password" name="password" type="password" placeholder="••••••••" />

        <x-forms.input label="Confirm Password" name="password_confirmation" type="password" placeholder="••••••••" />

        <x-forms.divider />

            <x-forms.input label="Teacher" name="employer" placeholder="Experience" />

            <x-forms.input label="Photo" name="logo" type="file"/>

        <x-forms.button>Create Account</x-forms.button>
    </x-forms.form>
</x-layout>