<x-layout>
    <x-page-heading>Edit Profile</x-page-heading>

    <x-forms.form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')

        <x-forms.input name="name" label="Name" :value="old('name', $user->name)" />
        <x-forms.input name="email" label="Email" :value="old('email', $user->email)" />
        <x-forms.input name="phone_number" label="Phone Number (WhatsApp)" :value="old('phone_number', $user->phone_number)" />
        <x-forms.input name="national_id" label="National ID (FAN)" :value="old('national_id', $user->national_id)" />
        
        <x-forms.divider />
        
        <x-forms.input name="password" label="New Password" type="password" placeholder="Leave blank to keep current" />
        <x-forms.input name="password_confirmation" label="Confirm New Password" type="password" />

        @if($user->employer)
            <x-forms.divider />
            <x-page-heading>Employer Information</x-page-heading>
            
            <x-forms.input name="employer_name" label="Employer/Company Name" :value="old('employer_name', $user->employer->name)" />
            
            <div class="flex items-center gap-4">
                <x-employer-logo :employer="$user->employer" :width="48" />
                <x-forms.input name="logo" label="Update Logo" type="file" />
            </div>
        @endif

        <x-forms.button>Update Profile</x-forms.button>
    </x-forms.form>
</x-layout>
