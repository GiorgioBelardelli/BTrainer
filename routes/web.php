<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrainerProfileController;

Route::get('/', [TrainerProfileController :: class, 'index'])
    -> name('index');

Route::get('/profiles/{id}', [TrainerProfileController :: class, 'show'])
    -> name('profile.show');

Route :: get('/create', [TrainerProfileController :: class, 'create']) -> name('profile.create');
Route :: post('/store', [TrainerProfileController :: class, 'store']) -> name('profile.store');



Route::get('/profile/{id}/edit', [TrainerProfileController :: class, 'edit'])
-> name('profile.edit');
Route::put('/profile/{id}/edit', [TrainerProfileController :: class, 'update'])
-> name('profile.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
