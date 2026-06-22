<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function show(Employer $employer)
    {
        return view('employers.show', [
            'employer' => $employer,
            'jobs' => $employer->jobs()->where('is_approved', true)->latest()->paginate(10)
        ]);
    }
}
