<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $user = $request->user();

        // Eager load the jobs through the employer record, ordered by newest
        $user->load(['jobs' => function ($query) {
            $query->latest();
        }]);

        return view('user.profile', [
            'user' => $user,
            'jobs' => $user->jobs // This contains the collection of Job models
        ]);
    }
}
