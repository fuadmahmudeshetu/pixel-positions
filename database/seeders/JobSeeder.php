<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $tags = collect(['Quran', 'Arabic', 'Islamic Studies', 'Math', 'Science', 'English', 'History', 'Amharic', 'Tafsir', 'Hadith'])
            ->map(fn($name) => Tag::firstOrCreate(['name' => $name]));
        $employers = Employer::query()->get();

        Job::factory(1)->create(new Sequence(
            fn($sequence) => [
                'employer_id' => $employers->random()->id,
                'featured' => $sequence->index % 4 === 0,
                'is_approved' => true,
                'status' => 'approved',
                'schedule' => $faker->randomElement(['full-time', 'part-time', 'contract']),
                'teaching_mode' => $faker->randomElement(['Online', 'In-person', 'Hybrid']),
                'gender_preference' => $faker->randomElement(['Male', 'Female', 'Any']),
            ]
        ))->each(function ($job) use ($tags) {
            $job->tags()->attach($tags->random(rand(1, 3))->pluck('id'));
        });

        // Add some pending jobs
        Job::factory(1)->create([
            'employer_id' => $employers->random()->id,
            'is_approved' => false,
            'status' => 'pending',
        ]);
    }
}
