<?php

use App\Models\Job;
use App\Models\User;
use App\Models\Employer;

test('teacher can post a job', function () {
    $user = User::factory()->teacher()->create();
    $employer = Employer::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->post(route('jobs.store'), [
        'title' => 'Quran Teacher Needed',
        'salary' => '$500',
        'location' => 'Remote',
        'description' => 'We need an experienced Quran teacher.',
        'schedule' => 'part-time',
        'gender_preference' => 'Any',
        'teaching_mode' => 'Online',
        'url' => 'https://example.com',
        'tags' => 'Quran, Arabic',
    ]);

    $response->assertRedirect(route('home'));
    $this->assertDatabaseHas('jobs', ['title' => 'Quran Teacher Needed']);
});

test('student cannot post a job', function () {
    $user = User::factory()->student()->create();

    $this->actingAs($user)
        ->post(route('jobs.store'), [])
        ->assertStatus(403);
});

test('job owner can delete their job', function () {
    $user = User::factory()->teacher()->create();
    $employer = Employer::factory()->create(['user_id' => $user->id]);
    $job = Job::factory()->create(['employer_id' => $employer->id]);

    $this->actingAs($user)
        ->delete(route('jobs.destroy', $job))
        ->assertRedirect(route('home'));

    $this->assertDatabaseMissing('jobs', ['id' => $job->id]);
});

test('user cannot delete someone else job', function () {
    $user1 = User::factory()->teacher()->create();
    $employer1 = Employer::factory()->create(['user_id' => $user1->id]);
    $job = Job::factory()->create(['employer_id' => $employer1->id]);

    $user2 = User::factory()->teacher()->create();

    $this->actingAs($user2)
        ->delete(route('jobs.destroy', $job))
        ->assertStatus(403);
});
