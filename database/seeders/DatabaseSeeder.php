<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Admin
        User::factory()->admin()->create([
            'name' => 'Kerumi Fa',
            'email' => 'kerumi@fuad.com',
            'password' => bcrypt('rumiyas'),
        ]);

        // 2. Create Teachers with Jobs (Jobs have Employers, Employers have Users)
        $this->call(JobSeeder::class);

        // 3. Create some Students
        User::factory(10)->student()->create();

        // 4. Create some standalone Teachers (with Employers)
        Employer::factory(5)->create();
    }
}
