<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1'], function () {
    Route::get('/all', [ApiController::class, 'getAll'])
        ->name('api.all');

    Route::get('/specializations', [ApiController::class, 'getSpecialization']);



    // Route::get('/profile', [ApiController::class, 'getProfile'])
    //     ->name('api.profile');
    // Route::get('/specialization', [ApiController::class, 'getSpecialization'])
    //     ->name('api.specialization');
});
