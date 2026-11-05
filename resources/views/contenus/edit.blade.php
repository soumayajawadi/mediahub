@extends('layouts.app')

@section('titre', 'Modifier Publication')

@section('contenu')
    <h1>Modifier la publication</h1>
    <form method="POST" action="{{ route('contenus.update', $publication) }}" style="margin-top: 20px;">
        @csrf
        @method('PUT')
        
        <!-- TITRE -->
        <div style="margin-bottom: 10px;">
            <label>Titre :</label><br>
            <input type="text" name="titre" value="{{ old('titre', $publication->titre) }}" required style="width: 100%; padding: 8px;">
            @error('titre')
                <span style="color: red; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </div>

        <!-- CATEGORIE -->
        <div style="margin-bottom: 10px;">
            <label>Catégorie :</label><br>
            <select name="categorie_id" required style="width: 100%; padding: 8px;">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $publication->categorie_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nom }}
                    </option>
                @endforeach
            </select>
            @error('categorie_id')
                <span style="color: red; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </div>

        <!-- CONTENU -->
        <div style="margin-bottom: 10px;">
            <label>Contenu :</label><br>
            <textarea name="contenu" required style="width: 100%; height: 100px; padding: 8px;">{{ old('contenu', $publication->contenu) }}</textarea>
            @error('contenu')
                <span style="color: red; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" style="padding: 10px 15px; cursor: pointer;">Enregistrer</button>
        <a href="{{ route('contenus.index') }}" style="margin-left: 10px;">Annuler</a>
    </form>
@endsection