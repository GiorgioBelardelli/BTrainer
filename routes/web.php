<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SponsorshipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\TrainerProfileController;

Route::get('profiles/{id}', [TrainerProfileController::class, 'index'])
    ->name('index');

Route::get('/profiles/{id}', [TrainerProfileController::class, 'show'])
    ->name('profile.show');

Route::get('/sponsorship/{id}', [SponsorshipController::class, 'checkout'])
    ->name('sponsorship.checkout');

Route::post('/sponsorship/link', [SponsorshipController::class, 'linkToProfile']);








// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/dashboard', [DashboardController::class, 'getProfile'])->name('dashboard');

Route::get('/usermessages', [DashboardController::class, 'getUserMessages'])->name('usermessages');

Route::get('/userreviews', [DashboardController::class, 'getUserReviews'])->name('userreviews');

Route::get('/sponsorship', [DashboardController::class, 'getSponsorship'])->name('sponsorship');

Route::get('/userstatistics', [DashboardController::class, 'getStatistics'])->name('statistics');

Route::get('/editprofile', [DashboardController::class, 'editProfile'])->name('editprofile');

Route::middleware('auth')->group(function () {

    Route::get('/create', [TrainerProfileController::class, 'create'])
        ->name('profile.create');

    Route::post('/store', [TrainerProfileController::class, 'store'])
        ->name('profile.store');

    Route::get('/profile/{id}/edit', [TrainerProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile/{id}/edit', [TrainerProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile/{id}', [TrainerProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
