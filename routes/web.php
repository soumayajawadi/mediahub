<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// 1. Routes de base
Route::get('/', [PageController::class, 'accueil'])->name('accueil'); // <--- Zidtha hné
Route::get('/a-propos', [PageController::class, 'aPropos'])->name('a-propos');

// 2. Exercice 1 & 2 : Route Categories (avec contrôleur)
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');

// 3. Note pour l'exercice {tri?}
// On gère le paramètre dans la méthode index() de ContenuController.

// 4. Route Resource pour les contenus
Route::resource('contenus', ContenuController::class);

// 5. Groupe Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/tableau-de-bord', [AdminController::class, 'index'])->name('dashboard');
});