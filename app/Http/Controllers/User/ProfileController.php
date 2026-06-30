<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $user = $request->user();

        $data = [
            'user' => $user,
        ];

        if ($user->isStudent()) {
            $data['bookmarks'] = $user->bookmarks()->latest()->take(5)->get();
        }

        if ($user->isTeacherOrEmployer()) {
            // Eager load the jobs through the employer record, ordered by newest
            $user->load(['jobs' => function ($query) {
                $query->latest();
            }]);
            $data['jobs'] = $user->jobs;
        }

        return view('user.profile', $data);
    }

    public function edit(Request $request)
    {
        return view('user.edit', [
            'user' => $request->user()
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $userAttributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone_number' => ['required', 'string', 'max:255', 'unique:users,phone_number,' . $user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if ($request->filled('password')) {
            $userAttributes['password'] = bcrypt($userAttributes['password']);
        } else {
            unset($userAttributes['password']);
        }

        $user->update($userAttributes);

        if ($user->employer) {
            $employerAttributes = $request->validate([
                'employer_name' => ['required', 'string', 'max:255'],
                'logo' => ['nullable', 'image', 'max:1024'],
            ]);

            $employerData = ['name' => $employerAttributes['employer_name']];

            if ($request->hasFile('logo')) {
                $employerData['logo'] = $request->file('logo')->store('logos', 'public');
            }

            $user->employer->update($employerData);
        }

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
