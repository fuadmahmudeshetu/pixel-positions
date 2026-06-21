<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;

use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $featuredJobs = Job::where('featured', 1)
            ->where('is_approved', 1)
            ->latest()
            ->simplePaginate(6, ['*'], 'featured_page')
            ->withQueryString()
            ->fragment('featured-jobs');

        $jobs = Job::where('featured', 0)
            ->where('is_approved', 1)
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
            ->where('is_approved', 1)
            ->latest()
            ->simplePaginate(6, ['*'], 'jobs_page')
            ->withQueryString()
            ->fragment('featured-jobs');

        // Remove the ->through() part so the frontend gets the real data
        $jobs = Job::where('featured', 0)
            ->where('is_approved', 1)
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

    public function academic()
    {
        return view('jobs.academic');
    }

    public function books()
    {
        return view('jobs.books');
    }

    public function duas()
    {
        return view('jobs.duas-card');
    }

    public function prayer()
    {
        return view('jobs.prayers');
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

        // 2. Process the tag string
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
        $this->authorize('update', $job);
        return view('jobs.edit', [
            'job' => $job
        ],);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        // 1. Validate incoming form inputs
        $validatedData = $request->validate([
            'title'    => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary'   => 'required|min:0',
            'phone'    => 'required|string', // Validates Ethiopian phone format
            'tags'     => 'nullable|string',
        ]);

        // 2. Update the Job post fields
        $job->update([
            'title'    => $validatedData['title'],
            'location' => $validatedData['location'],
            'salary'   => $validatedData['salary'],
        ]);

        // 3. Update the phone_number directly on the associated User model
        // This targets the exact 'phone_number' column on your users table
        if ($job->employer && $job->employer->user) {
            $job->employer->user->update([
                'phone_number' => $validatedData['phone']
            ]);
        }

        // 4. Process and sync the tag string ("quran, hadith")
        if (!empty($validatedData['tags'])) {
            // Explode by comma, trim empty spaces, filter out empty inputs
            $tagNames = array_filter(array_map('trim', explode(',', $validatedData['tags'])));

            $tagIds = [];
            foreach ($tagNames as $name) {
                // Find existing tag by name or spin up a new instance
                $tag = Tag::firstOrCreate(['name' => mb_strtolower($name)]);
                $tagIds[] = $tag->id;
            }

            // Sync attaches new IDs and detaches removed ones automatically
            $job->tags()->sync($tagIds);
        } else {
            // If the tags field was completely cleared, wipe pivot table links
            $job->tags()->detach();
        }

        // 5. Redirect back to the dashboard or single job card with a success message
        return redirect()->route('jobs.index')
            ->with('success', 'Job card updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('jobs.index')
            ->with('success', 'Job card deleted successfully!');
    }
}
