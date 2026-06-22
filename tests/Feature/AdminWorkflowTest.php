<?php

use App\Models\Job;
use App\Models\User;

test('admin can see dashboard', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get(route('admin.dashboard'))
        ->assertStatus(200);
});

test('admin can approve a job', function () {
    $admin = User::factory()->admin()->create();
    $job = Job::factory()->create(['is_approved' => false, 'status' => 'pending']);

    $this->actingAs($admin)
        ->patch(route('admin.jobs.approve', $job))
        ->assertRedirect();

    expect($job->fresh()->is_approved)->toBe(1);
    expect($job->fresh()->status)->toBe('approved');
});

test('admin can reject a job with reason', function () {
    $admin = User::factory()->admin()->create();
    $job = Job::factory()->create(['is_approved' => true, 'status' => 'approved']);

    $this->actingAs($admin)
        ->patch(route('admin.jobs.reject', $job), [
            'rejection_reason' => 'Inappropriate content'
        ])
        ->assertRedirect();

    expect($job->fresh()->is_approved)->toBe(0);
    expect($job->fresh()->status)->toBe('rejected');
    expect($job->fresh()->rejection_reason)->toBe('Inappropriate content');
});

test('non-admin cannot access admin routes', function () {
    $user = User::factory()->teacher()->create();

    $this->actingAs($user)
        ->get(route('admin.dashboard'))
        ->assertStatus(403);
});
