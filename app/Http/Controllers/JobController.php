<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $featuredJobs = Job::where('featured', 1)
            ->latest()
            ->simplePaginate(6, ['*'], 'featured_page')
            ->withQueryString()
            ->fragment('featured-jobs');

        $jobs = Job::where('featured', 0)
            ->latest()
            ->simplePaginate(6, ['*'], 'jobs_page')
            ->withQueryString()
            ->fragment('recent-jobs');


        return view('jobs.index', [
            'featuredJobs' => $featuredJobs,
            'jobs' => $jobs,
            'tags' => Tag::all()
        ]);
    }

    public function teachers()
    {
        $featuredJobs = Job::where('featured', 1)
            ->latest()
            ->simplePaginate(6, ['*'], 'featured_page')
            ->withQueryString()
            ->fragment('featured-jobs');

        $jobs = Job::where('featured', 0)
            ->latest()
            ->simplePaginate(6, ['*'], 'jobs_page')
            ->withQueryString()
            ->fragment('recent-jobs');

        return view('jobs.teachers', [
            'featuredJobs' => $featuredJobs,
            'jobs' => $jobs,
            'tags' => Tag::all()
        ]);
    }

    public function books()
    {
        return view('jobs.books');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'string'], // Salary is often better as string if it includes currency/formatting
            'location' => ['required', 'string', 'max:255'],
            'schedule' => ['required', Rule::in(['full-time', 'part-time', 'contract', 'temporary'])],
            'url' => ['required', 'string', 'url', 'max:255'],
            'tags' => ['nullable', 'string'], // 1. Change 'array' to 'string'
        ]);

        $attributes['featured'] = $request->has('featured');

        // Create the job
        $job = Auth::user()->employer->jobs()->create(
            Arr::except($attributes, 'tags')
        );

        // 2. Process the tags string
        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tagName) {
                // Use firstOrCreate so you don't create duplicate tags in the DB
                $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
                $job->tags()->attach($tag->id);
            }
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
