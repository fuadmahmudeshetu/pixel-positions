<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => $this->faker->jobTitle(),
            'salary' => $this->faker->randomElement(['$30,000 USD', '$40,000 USD', '$50,000 USD', '$60,000 USD', '$70,000 USD', '$80,000 USD', '$90,000 USD', '$100,000 USD']),
            'location' => $this->faker->city(),
            'is_approved' => false,
            'schedule' => 'Full-time',
            'gender_preference' => 'Any',
            'teaching_mode' => 'In-person',
            'url' => $this->faker->url(),
            'status' => 'pending',
            'featured' => false,
        ];
    }
}
