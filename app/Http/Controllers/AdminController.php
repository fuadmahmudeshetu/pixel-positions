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
        $jobs = Job::all()->count();
        $users = User::all()->count();
        $employers = Employer::all()->count();

        return view('admin.dashboard', [
            'jobs' => $jobs,
            'users' => $users,
            'employers' => $employers
        ]);
    }

    public function users()
    {
        $users = User::all();

        return view('admin.users', [
            'users' => $users
        ]);
    }

    public function jobs() {

        $jobs = Job::with('employer.user')->latest()->get();

        return view('admin.jobs',[
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
            'phone_number' => ['nullable', 'string', 'max:30'],
        ]);

        $user->update($validated);

        return redirect()->route('admin.users.')->with('success', 'User updated successfully.');
    }

    public function destroy (User $user) {
        $user->delete();

        return redirect('/admin/users');
    }

    public function approve(Job $job) {
        $job->update([
            'is_approved' => true,
            'status' => 'approved'
        ]);

        return redirect()->back()->with('success', 'Job approved successfully.');
    }

    public function reject(Job $job) {
        $job->update([
            'is_approved' => false,
            'status' => 'rejected'
        ]);

        return redirect()->back()->with('success', 'Job rejected successfully.');
    }
}
