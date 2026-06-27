<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (Schema::hasTable('notifications')) {
            DB::table('notifications')->delete();
        }

        if (Schema::hasTable('bookmarks')) {
            DB::table('bookmarks')->delete();
        }

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
        User::factory(1)->teacher()->create()
            ->each(fn (User $user) => Employer::factory()->create([
                'user_id' => $user->id,
            ]));

        // 3. Create 5 Students
        User::factory(1)->student()->create();

        // 4. Create Jobs for the existing Teachers
        $this->call(JobSeeder::class);
    }
}

