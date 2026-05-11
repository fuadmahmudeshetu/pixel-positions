<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $job = Job::where('title', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')
            ->orWhereHas('employer', function ($query) {
                $query->where('name', 'like', '%' . request('search') . '%');
            })
            ->get();

        return view('jobs.results', [
            'jobs' => $job,
        ]);
    }
}
