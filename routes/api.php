<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PublicationController;
use App\Http\Controllers\Api\AuthController;

Route::apiResource('publications', PublicationController::class)->only(['index', 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('publications', PublicationController::class)->except(['index', 'show']);
    Route::post('/deconnexion', [AuthController::class, 'deconnecter']);
});

Route::post('/connexion', [AuthController::class, 'connecter']);