<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->controller(JobController::class)->group(function () {
    Route::get('/jobs/create', 'create')->name('jobs.create');
    Route::post('/jobs', 'store')->name('jobs.store');
});

Route::controller(JobController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/jobs', 'index')->name('jobs.index');
    Route::get('/jobs/{job}', 'show')->name('jobs.show');
    Route::get('/teachers', 'teachers')->name('jobs.teachers');
});

Route::middleware('auth')->controller(\App\Http\Controllers\User\ProfileController::class)->group(function () {
    Route::get('/profile', 'show')->name('profile.show');
    Route::get('/profile/edit', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
});

Route::middleware('auth')->group(function () {
    Route::post('/jobs/{job}/bookmark', [\App\Http\Controllers\BookmarkController::class, 'toggle'])->name('jobs.bookmark');
    Route::get('/bookmarks', [\App\Http\Controllers\BookmarkController::class, 'index'])->name('bookmarks.index');

    Route::post('/notifications/{id}/read', function ($id) {
        auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
        return back();
    })->name('notifications.read');

    Route::get('/books', [JobController::class, 'books'])->name('jobs.books');
    Route::get('/academic', [JobController::class, 'academic'])->name('jobs.academic');
    Route::get('/hadith', [JobController::class, 'books'])->name('jobs.hadith');
    Route::get('/duas', [JobController::class, 'duas'])->name('jobs.duas');
    Route::get('/prayers', [JobController::class, 'prayer'])->name('jobs.prayers');
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->controller(AdminController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/jobs', 'jobs')->name('jobs');
    Route::patch('/jobs/{job}/approve', 'approve')->name('jobs.approve');
    Route::patch('/jobs/{job}/reject', 'reject')->name('jobs.reject');

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', 'users')->name('');
        Route::get('/{user}/edit', 'edit')->name('edit');
        Route::patch('/{user}', 'update')->name('update');
        Route::delete('/{user}', 'destroy')->name('destroy');
    });
});

Route::get('/search', SearchController::class)->name('search');

Route::get('/tags/{tag:name}', TagController::class)->name('tags');

Route::get('/employers/{employer}', [\App\Http\Controllers\EmployerController::class, 'show'])->name('employers.show');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('login.store');
});

Route::delete('/logout', [SessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
