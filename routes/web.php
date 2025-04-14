<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // Redirect to login page if user is not authenticated
    if (Auth::check()) {
        return redirect()->route('tasks.index');
    }
    return view('auth.login'); // Show login page for non-authenticated users
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ✅ Task Manager Routes
    Route::resource('tasks', TaskController::class);
});

require __DIR__.'/auth.php';
