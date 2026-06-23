<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        DB::table('job_tag')->delete();
        DB::table('jobs')->delete();
        DB::table('employers')->delete();
        DB::table('users')->delete();

        // 1. Create Admin
        User::factory()->admin()->create([
            'name' => 'Kerumi Fa',
            'email' => 'kerumi@fuad.com',
            'password' => bcrypt('rumiyas'),
        ]);

        // 2. Create 5 Teachers with Employers
        User::factory(5)->teacher()->create()
            ->each(fn (User $user) => Employer::factory()->create([
                'user_id' => $user->id,
            ]));

        // 3. Create 5 Students
        User::factory(5)->student()->create();

        // 4. Create Jobs for the existing Teachers
        $this->call(JobSeeder::class);
    }
}
