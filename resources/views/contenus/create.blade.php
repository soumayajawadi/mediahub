@extends('layouts.app')
@section('titre', 'Nouvelle Publication')
@section('contenu')
    <h1>Créer une publication</h1>
    <form method="POST" action="{{ route('contenus.store') }}">
        @csrf
        <div>
            <label>Titre :</label><br>
            <input type="text" name="titre" required style="width: 100%;">
        </div>
        <div style="margin-top: 10px;">
            <label>Catégorie :</label><br>
            <select name="categorie_id" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                @endforeach
            </select>
        </div>
        <div style="margin-top: 10px;">
            <label>Contenu :</label><br>
            <textarea name="contenu" required style="width: 100%; height: 100px;"></textarea>
        </div>
        <button type="submit" style="margin-top: 10px;">Publier</button>
    </form>
@endsection