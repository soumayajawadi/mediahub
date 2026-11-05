@extends('layouts.app')
@section('titre', 'Modifier Publication')
@section('contenu')
    <h1>Modifier la publication</h1>
    <form method="POST" action="{{ route('contenus.update', $publication) }}">
        @csrf
        @method('PUT')
        <div>
            <label>Titre :</label><br>
            <input type="text" name="titre" value="{{ old('titre', $publication->titre) }}" required style="width: 100%;">
        </div>
        <div style="margin-top: 10px;">
            <label>Catégorie :</label><br>
            <select name="categorie_id" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $publication->categorie_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        <div style="margin-top: 10px;">
            <label>Contenu :</label><br>
            <textarea name="contenu" required style="width: 100%; height: 100px;">{{ old('contenu', $publication->contenu) }}</textarea>
        </div>
        <button type="submit" style="margin-top: 10px;">Enregistrer</button>
    </form>
@endsection