@extends('layouts.app')

@section('titre', 'Modifier Catégorie')

@section('contenu')
    <h1>Modifier la catégorie</h1>
    
    <form method="POST" action="{{ route('categories.update', $categorie) }}" style="margin-top: 20px;">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 10px;">
            <label for="nom">Nom de la catégorie :</label><br>
            <input type="text" name="nom" id="nom" value="{{ old('nom', $categorie->nom) }}" required style="width: 100%; padding: 8px;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label for="slug">Slug :</label><br>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $categorie->slug) }}" required style="width: 100%; padding: 8px;">
        </div>
        
        <button type="submit" style="padding: 10px 15px; cursor: pointer;">Enregistrer les modifications</button>
        <a href="{{ route('categories.index') }}" style="margin-left: 10px;">Annuler</a>
    </form>
@endsection