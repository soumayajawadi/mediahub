<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// 1. Routes de base
Route::get('/', [PageController::class, 'accueil'])->name('accueil');
Route::get('/a-propos', [PageController::class, 'aPropos'])->name('a-propos');

// 2. Categories
Route::resource('categories', CategorieController::class);

// 3. Contenus (L'ORDRE HNA MOHIM!)
// A. Routes protégées (create, store, edit, update, destroy) - LEZMOU YKOUNOU L'OUWEL
Route::middleware('auth')->group(function () {
    Route::resource('contenus', ContenuController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
});

// B. Routes publiques (index, show) - LEZMOU YKOUNOU LOUT
Route::resource('contenus', ContenuController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);

// 4. Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/tableau-de-bord', [AdminController::class, 'index'])->name('dashboard');
});

// 5. Auth
Route::middleware('guest')->group(function () {
    Route::get('/inscription', [AuthController::class, 'create'])->name('inscription');
    Route::post('/inscription', [AuthController::class, 'store']);
    Route::get('/connexion', [AuthController::class, 'creerConnexion'])->name('connexion');
    Route::post('/connexion', [AuthController::class, 'connecter']);
});

Route::middleware('auth')->group(function () {
    Route::post('/deconnexion', [AuthController::class, 'deconnecter'])->name('deconnexion');
});