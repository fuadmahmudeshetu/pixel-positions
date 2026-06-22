<?php

namespace Database\Seeders;

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
        $tags = collect(['Quran', 'Arabic', 'Islamic Studies', 'Math', 'Science', 'English', 'History', 'Amharic', 'Tafsir', 'Hadith'])
            ->map(fn($name) => Tag::firstOrCreate(['name' => $name]));

        Job::factory(20)->create(new Sequence(
            fn($sequence) => [
                'featured' => $sequence->index % 4 === 0,
                'is_approved' => true,
                'status' => 'approved',
                'schedule' => fake()->randomElement(['full-time', 'part-time', 'contract']),
                'teaching_mode' => fake()->randomElement(['Online', 'In-person', 'Hybrid']),
                'gender_preference' => fake()->randomElement(['Male', 'Female', 'Any']),
            ]
        ))->each(function ($job) use ($tags) {
            $job->tags()->attach($tags->random(rand(1, 3))->pluck('id'));
        });

        // Add some pending jobs
        Job::factory(5)->create([
            'is_approved' => false,
            'status' => 'pending',
        ]);
    }
}
