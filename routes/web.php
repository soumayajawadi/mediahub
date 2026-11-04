<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// 1. Routes de base
Route::get('/', [PageController::class, 'accueil']);
Route::get('/a-propos', [PageController::class, 'aPropos'])->name('a-propos');

// 2. Exercice 1 & 2 : Route Categories (avec contrôleur)
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');

// 3. Exercice 3 : Paramètre optionnel {tri?} (on utilise le resource pour /contenus)
// NOTE: On ne peut pas mettre {tri?} directement sur la route 'resource'. 
// La solution la plus propre pour l'exercice est de laisser le resource gérer /contenus 
// et de gérer le {tri?} DANS la méthode index() du contrôleur (voir explication en bas).

// 4. Route Resource pour les contenus
Route::resource('contenus', ContenuController::class);

// 5. Groupe Admin (Page 8 du PDF)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/tableau-de-bord', [AdminController::class, 'index'])->name('dashboard');
});