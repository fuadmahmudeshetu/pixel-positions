<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $job = Job::query()
            ->where('is_approved', true)
            ->where(function ($query) {
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhereHas('employer', function ($query) {
                        $query->where('name', 'like', '%' . request('search') . '%');
                    });
            })
            ->get();

        return view('jobs.results', [
            'jobs' => $job,
        ]);
    }
}
