<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController :: class, 'index'])
    -> name('index');

Route::get('/users/{id}', [UserController :: class, 'show'])
    -> name('user.show');

Route::get('/users/{id}/edit', [UserController :: class, 'edit'])
-> name('user.edit');

Route::put('/users/{id}/edit', [UserController :: class, 'update'])
-> name('user.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
