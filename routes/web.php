<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\TasksController;

Route::get('/', [TasksController::class, 'index']);

Route::get('/dashboard', [TasksController::class, 'index'])
->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TasksController::class);
});

require __DIR__.'/auth.php';
