<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;

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
}
