<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class RegisterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function store(Request $request)
    {
        $userAttribute = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $employerAttribute = $request->validate([

            'employer' => ['required', 'string', 'max:255'],

            'logo' => ['required', File::types(['jpg', 'jpeg', 'png'])->max(1024)], // Max 1MB

        ]);


        $user = User::create($userAttribute);

        $logoPath = $request->logo->store('logos');

        $user->employer()->create([
            'name' => $employerAttribute['employer'],
            'logo' => $logoPath
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
}
