<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::controller(JobController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/jobs', 'index')->name('jobs.index');
    Route::get('/teachers', 'teachers')->name('jobs.teachers');
});

Route::middleware('auth')->controller(JobController::class)->group(function () {
    Route::get('/jobs/create', 'create')->name('jobs.create');
    Route::post('/jobs', 'store')->name('jobs.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/books', [JobController::class, 'books'])->name('jobs.books');
    Route::get('/academic', [JobController::class, 'academic'])->name('jobs.academic');
    Route::get('/hadith', [JobController::class, 'books'])->name('jobs.hadith');
    Route::get('/duas', [JobController::class, 'duas'])->name('jobs.duas');
    Route::get('/prayers', [JobController::class, 'prayer'])->name('jobs.prayers');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/jobs', 'jobs')->name('jobs');
        Route::patch('/jobs/{job}/approve', 'approve')->name('jobs.approve');

        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', 'users')->name('');
            Route::get('/{user}/edit', 'edit')->name('edit');
            Route::patch('/{user}', 'update')->name('update');
            Route::delete('/{user}', 'destroy')->name('destroy');
        });
});

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
