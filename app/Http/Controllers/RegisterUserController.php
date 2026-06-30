<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
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
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'role' => ['required', Rule::in(['student', 'teacher'])],
            'phone_number' => 'required|string|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'employer' => ['required_if:role,teacher', 'nullable', 'string', 'max:255'],
            'logo' => ['nullable', File::types(['jpg', 'jpeg', 'png'])->max(1024)], // Max 1MB
        ]);

        $user = User::create([
            'name' => $attributes['name'],
            'role' => $attributes['role'],
            'phone_number' => $attributes['phone_number'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password']),
        ]);

        if ($user->role === 'teacher') {
            $logoPath = $request->file('logo')?->store('logos', 'public');

            $user->employer()->create([
                'name' => $attributes['employer'],
                'logo' => $logoPath
            ]);
        }

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful.');
    }
}
