<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\VoteController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1'], function () {
    Route::get('/all', [ApiController::class, 'getAll'])
    ->name('api.all');
    
    Route::get('/specializations', [ApiController::class, 'getSpecialization']);
    
    Route::get('/sponsorships', [SponsorshipController::class, 'getSponsorships']);

    Route::get('/generate', [ApiController::class, 'generate']);
    Route::post('/make/payment', [ApiController::class, 'makePayment']);


    Route::get('/votes', [ApiController::class, 'getVotes']);

    Route::post('/reviews', [ApiController::class, 'createReview']);

    Route::post('/messages', [ApiController::class, 'createMessage']);

    Route::post('/votes', [ApiController::class, 'createVote']);

    Route::post('/profiles/{profile}/vote', [VoteController::class, 'store'])
    ->name('profiles.vote');

    // Route::get('/profile', [ApiController::class, 'getProfile'])
    //     ->name('api.profile');
    // Route::get('/specialization', [ApiController::class, 'getSpecialization'])
    //     ->name('api.specialization');
});
