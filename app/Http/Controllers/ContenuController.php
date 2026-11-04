<?php

namespace App\Http\Controllers;

class ContenuController extends Controller
{
    public function index() {
    $contenus = [
        (object) ['titre' => 'Court-métrage documentaire', 'description' => 'Un aperçu de la vie urbaine.'],
        (object) ['titre' => 'Podcast technologie', 'description' => 'Actualités du développement web.'],
    ];
    return view('contenus.index', ['contenus' => $contenus]);
}
    public function create()
    {
        return 'Formulaire de création';
    }

    public function store()
    {
        return 'Enregistrement';
    }

    public function show($id)
    {
        return 'Détail du contenu numéro ' . $id;
    }

    public function edit($id)
    {
        return 'Modification du contenu ' . $id;
    }

    public function update($id)
    {
        return 'Mise à jour du contenu ' . $id;
    }

    public function destroy($id)
    {
        return 'Suppression du contenu ' . $id;
    }
}