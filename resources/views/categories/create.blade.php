@extends('layouts.app')

@section('titre', 'Nouvelle Catégorie')

@section('contenu')
    <h1>Créer une catégorie</h1>
    
    <form method="POST" action="{{ route('categories.store') }}" style="margin-top: 20px;">
        @csrf
        
        <div style="margin-bottom: 10px;">
            <label for="nom">Nom de la catégorie :</label><br>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required style="width: 100%; padding: 8px;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label for="slug">Slug (ex: video, audio) :</label><br>
            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required style="width: 100%; padding: 8px;">
        </div>
        
        <button type="submit" style="padding: 10px 15px; cursor: pointer;">Créer la catégorie</button>
        <a href="{{ route('categories.index') }}" style="margin-left: 10px;">Annuler</a>
    </form>
@endsection