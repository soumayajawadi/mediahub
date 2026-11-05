<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        Categorie::create($request->only('nom', 'slug'));
        return redirect()->route('categories.index')->with('succes', 'Catégorie créée avec succès.');
    }

    // RAKKEZ: hné beddelna l $categorie w 5allineha $category
    public function edit(Categorie $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Categorie $category)
    {
        $category->update($request->only('nom', 'slug'));
        return redirect()->route('categories.index')->with('succes', 'Catégorie mise à jour avec succès.');
    }

    public function destroy(Categorie $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index')->with('succes', 'Catégorie supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('erreur', 'Impossible de supprimer cette catégorie car elle contient des publications.');
        }
    }
}