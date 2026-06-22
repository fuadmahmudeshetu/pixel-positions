<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $query = Job::query()->with(['employer', 'tags'])->where('is_approved', true);

        if (request('search')) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . request('search') . '%')
                    ->orWhereHas('employer', function ($q) {
                        $q->where('name', 'like', '%' . request('search') . '%');
                    })
                    ->orWhereHas('tags', function ($q) {
                        $q->where('name', 'like', '%' . request('search') . '%');
                    });
            });
        }

        if (request('location')) {
            $query->where('location', 'like', '%' . request('location') . '%');
        }

        if (request('schedule')) {
            $query->where('schedule', request('schedule'));
        }

        if (request('teaching_mode')) {
            $query->where('teaching_mode', request('teaching_mode'));
        }

        if (request('gender')) {
            $query->where('gender_preference', request('gender'));
        }

        $jobs = $query->latest()->get();

        return view('jobs.results', [
            'jobs' => $jobs,
        ]);
    }
}
