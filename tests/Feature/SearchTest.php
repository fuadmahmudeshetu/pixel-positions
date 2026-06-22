<?php

use App\Models\Job;

test('user can search for jobs by title', function () {
    Job::factory()->create(['title' => 'Laravel Developer', 'is_approved' => true]);
    Job::factory()->create(['title' => 'React Developer', 'is_approved' => true]);

    $response = $this->get('/search?search=Laravel');

    $response->assertStatus(200);
    $response->assertSee('Laravel Developer');
    $response->assertDontSee('React Developer');
});

test('user can filter jobs by teaching mode', function () {
    Job::factory()->create(['title' => 'Online Math', 'teaching_mode' => 'Online', 'is_approved' => true]);
    Job::factory()->create(['title' => 'Offline Math', 'teaching_mode' => 'In-person', 'is_approved' => true]);

    $response = $this->get('/search?teaching_mode=Online');

    $response->assertStatus(200);
    $response->assertSee('Online Math');
    $response->assertDontSee('Offline Math');
});
