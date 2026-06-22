<x-layout>
    <x-page-heading>
        Register
    </x-page-heading>

    <x-forms.form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data" x-data="{ role: '{{ old('role') }}' }">

        <x-forms.input label="Name" name="name" placeholder="John Doe" />
        <x-forms.select label="Role" name="role" x-model="role">
            <option value="">Account Type</option>
            <option value="teacher">Teacher</option>
            <option value="student">Student</option>
        </x-forms.select>
        <x-forms.input label="Phone Number ( WhatsApp )" name="phone_number" placeholder="+251/0912345678" />

        <x-forms.input label="National ID (FAN)" name="national_id" placeholder="123456789" />

        <x-forms.input label="Email" name="email" type="email" placeholder="you@example.com" />

        <x-forms.input label="Password" name="password" type="password" placeholder="••••••••" />

        <x-forms.input label="Confirm Password" name="password_confirmation" type="password" placeholder="••••••••" />

        <div x-show="role === 'teacher'">
            <x-forms.divider />

            <x-forms.input label="Teacher" name="employer" placeholder="Experience" x-bind:disabled="role !== 'teacher'" />

            <x-forms.input label="Photo" name="logo" type="file" x-bind:disabled="role !== 'teacher'" />
        </div>

        <x-forms.button>Create Account</x-forms.button>
    </x-forms.form>
</x-layout>