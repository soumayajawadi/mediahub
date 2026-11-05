<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::withCount('publications')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    // HNA RAKKEZ: Beddelna Request b StoreCategorieRequest w 5allina $request->validated()
    public function store(StoreCategorieRequest $request)
    {
        Categorie::create($request->validated());
        return redirect()->route('categories.index')->with('succes', 'Catégorie créée avec succès.');
    }

    // HNA RAKKEZ: 5allina $categorie (b ie) bch yetf9a m3a el vue
    public function edit(Categorie $categorie)
    {
        return view('categories.edit', compact('categorie'));
    }

    // HNA RAKKEZ: Beddelna Request b UpdateCategorieRequest w 5allina $categorie
    public function update(UpdateCategorieRequest $request, Categorie $categorie)
    {
        $categorie->update($request->validated());
        return redirect()->route('categories.index')->with('succes', 'Catégorie mise à jour avec succès.');
    }

    // HNA RAKKEZ: 5allina $categorie
    public function destroy(Categorie $categorie)
    {
        try {
            $categorie->delete();
            return redirect()->route('categories.index')->with('succes', 'Catégorie supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('erreur', 'Impossible de supprimer cette catégorie car elle contient des publications.');
        }
    }
}