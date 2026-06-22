<x-layout>
    <x-page-heading>Create Job</x-page-heading>

    <x-forms.form action="{{ route('jobs.store') }}" method="POST">
        <x-forms.input name="title" label="Job Title" />
        <x-forms.input name="salary" label="Salary Range" />
        <x-forms.input name="location" label="Location" />
        <x-forms.textarea name="description" label="Description" />

        <x-forms.select name="schedule" label="Schedule">
            <option value="">Select Schedule</option>
            <option value="full-time">Full Time</option>
            <option value="part-time">Part Time</option>
        </x-forms.select>

        <x-forms.select name="gender_preference" label="Gender Preference">
            <option value="Any">Any</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </x-forms.select>

        <x-forms.select name="teaching_mode" label="Teaching Mode">
            <option value="In-person">In-person</option>
            <option value="Online">Online</option>
            <option value="Hybrid">Hybrid</option>
        </x-forms.select>

        <x-forms.input name="url" label="URL" placeholder="https://example.com/job" />

        <x-forms.checkbox name="featured" label="Feature (Costs Extra)" />

        <x-forms.divider />

        <x-forms.input name="tags" label="Tags (Comma-Separated)" placeholder="e.g., PHP, Laravel, MySQL" />

        <x-forms.button>Publish Job</x-forms.button>
    </x-forms.form>
</x-layout>