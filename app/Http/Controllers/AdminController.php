<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $jobs = Job::count();
        $users = User::count();
        $employers = Employer::count();

        return view('admin.dashboard', [
            'jobs' => $jobs,
            'users' => $users,
            'employers' => $employers
        ]);
    }

    public function users()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('admin.users', [
            'users' => $users
        ]);
    }

    public function jobs()
    {
        $jobs = Job::with('employer.user')->orderBy('id', 'desc')->paginate(10);

        return view('admin.jobs', [
            'jobs' => $jobs
        ]);
    }

    public function dashboard()
    {
        return view('layouts.admin');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone_number' => ['required', 'string', 'max:30', 'unique:users,phone_number,' . $user->id],
            'national_id' => ['required', 'string', 'max:255', 'unique:users,national_id,' . $user->id],
            'role' => ['required', 'string', 'in:student,teacher,admin'],
        ]);

        $user->update($validated);

        return redirect()->route('admin.users.')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.')->with('success', 'User deleted successfully.');
    }

    public function approve(Job $job)
    {
        $job->update([
            'is_approved' => true,
            'status' => 'approved'
        ]);

        if ($job->employer && $job->employer->user) {
            $job->employer->user->notify(new \App\Notifications\JobStatusChanged($job));
        }

        return redirect()->back()->with('success', 'Job approved successfully.');
    }

    public function reject(Request $request, Job $job)
    {
        $validated = $request->validate([
            'rejection_reason' => 'required|string|max:1000'
        ]);

        $job->update([
            'is_approved' => false,
            'status' => 'rejected',
            'rejection_reason' => $validated['rejection_reason']
        ]);

        if ($job->employer && $job->employer->user) {
            $job->employer->user->notify(new \App\Notifications\JobStatusChanged($job));
        }

        return redirect()->back()->with('success', 'Job rejected with reason.');
    }
}
