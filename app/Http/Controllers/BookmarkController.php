<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function toggle(Job $job)
    {
        $user = Auth::user();

        if ($user->bookmarks()->where('job_id', $job->id)->exists()) {
            $user->bookmarks()->detach($job->id);
            $message = 'Job removed from bookmarks.';
        } else {
            $user->bookmarks()->attach($job->id);
            $message = 'Job saved to bookmarks.';
        }

        return redirect()->back()->with('success', $message);
    }

    public function index()
    {
        $bookmarks = Auth::user()->bookmarks()->latest()->paginate(10);

        return view('jobs.bookmarks', [
            'jobs' => $bookmarks
        ]);
    }
}
