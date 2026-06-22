<?php

use App\Models\User;

test('guest can see registration page', function () {
    $this->get(route('register'))
        ->assertStatus(200);
});

test('guest can register as a student', function () {
    $response = $this->post(route('register.store'), [
        'name' => 'Test Student',
        'email' => 'student@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'role' => 'student',
        'phone_number' => '1234567890',
        'national_id' => 'STU123',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('home'));
    
    $user = User::where('email', 'student@example.com')->first();
    expect($user->role)->toBe('student');
});

test('guest can register as a teacher', function () {
    $response = $this->post(route('register.store'), [
        'name' => 'Test Teacher',
        'email' => 'teacher@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'role' => 'teacher',
        'phone_number' => '0987654321',
        'national_id' => 'TEA123',
        'employer' => 'Test School',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('home'));
    
    $user = User::where('email', 'teacher@example.com')->first();
    expect($user->role)->toBe('teacher');
    expect($user->employer)->not->toBeNull();
});

test('guest can login', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password')
    ]);

    $response = $this->post(route('login.store'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticatedAs($user);
    $response->assertRedirect(route('home'));
});

test('user can logout', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->delete(route('logout'))
        ->assertRedirect(route('home'));

    $this->assertGuest();
});
