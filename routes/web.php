<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// 1. Routes de base
Route::get('/', [PageController::class, 'accueil'])->name('accueil'); 
Route::get('/a-propos', [PageController::class, 'aPropos'])->name('a-propos');

// 2. Route Resource mte3 les Catégories (Baddelna el get b resource)
Route::resource('categories', CategorieController::class);

// 3. Route Resource mte3 les Contenus
Route::resource('contenus', ContenuController::class);

// 4. Groupe Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/tableau-de-bord', [AdminController::class, 'index'])->name('dashboard');
});