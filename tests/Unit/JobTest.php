<?php

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;

it('belongs to an employer', function () {
    // Arrange
    $employer = Employer::factory()->create();
    $job = Job::factory()->create(['employer_id' => $employer->id]);

    // Act and Assert
    expect($job->employer)->is($employer)->toBeTrue();
});

it('can have tags', function () {
    // Arrange
    $job = Job::factory()->create();
    $job->tags()->attach(Tag::factory()->create());

    // Act and Assert
    expect($job->tags)->toHaveCount(1);
});