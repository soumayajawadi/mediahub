@extends('layouts.app')

@section('titre', 'Nouvelle Publication')

@section('contenu')
    <h1>Créer une publication</h1>
    <form method="POST" action="{{ route('contenus.store') }}" style="margin-top: 20px;">
        @csrf
        <div style="margin-bottom: 10px;">
            <label>Titre :</label><br>
            <input type="text" name="titre" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 10px;">
            <label>Catégorie :</label><br>
            <select name="categorie_id" required style="width: 100%; padding: 8px;">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                @endforeach
            </select>
        </div>
        <div style="margin-bottom: 10px;">
            <label>Contenu :</label><br>
            <textarea name="contenu" required style="width: 100%; height: 100px; padding: 8px;"></textarea>
        </div>
        <button type="submit" style="padding: 10px 15px; cursor: pointer;">Publier</button>
        <a href="{{ route('contenus.index') }}" style="margin-left: 10px;">Annuler</a>
    </form>
@endsection