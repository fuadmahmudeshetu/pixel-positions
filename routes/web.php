<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);

Route::get('/jobs/create', [JobController::class, 'create'])
    ->middleware('auth')
    ->name('jobs.create');

Route::post('/jobs', [JobController::class, 'store'])
    ->middleware('auth')
    ->name('jobs.store');

Route::get('/teachers', [JobController::class, 'teachers'])->name('jobs.teachers');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');

Route::get('/books', [JobController::class, 'books'])->name('jobs.books');
Route::get('/academic', [JobController::class, 'academic'])->name('jobs.academic');
Route::get('/hadith', [JobController::class, 'books'])->name('jobs.hadith');
Route::get('/duas', [JobController::class, 'duas'])->name('jobs.duas');
Route::get('/prayers', [JobController::class, 'prayer'])->name('jobs.prayers');

Route::get('/search', SearchController::class);

Route::get('/tags/{tag:name}', TagController::class);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('login.store');
});

Route::delete('/logout', [SessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
