@extends('layouts.app')

@section('titre', 'Contenus')

@section('contenu')
    <h1>Contenus multimédias</h1>
    <a href="{{ route('contenus.create') }}">+ Ajouter une publication</a>
    
    <div class="grid" style="margin-top: 20px;">
        @forelse ($publications as $publication)
            <x-carte titre="{{ $publication->titre }}">
                <p>{{ Str::limit($publication->contenu, 100) }}</p>
                <small>Catégorie: <strong>{{ $publication->categorie->nom }}</strong> | Auteur: {{ $publication->auteur->name }}</small><br><br>
                <a href="{{ route('contenus.show', $publication->id) }}">Lire la suite</a> | 
                <a href="{{ route('contenus.edit', $publication) }}">Modifier</a>
                <form action="{{ route('contenus.destroy', $publication) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Etes-vous sûr ?')">Supprimer</button>
                </form>
            </x-carte>
        @empty
            <p>Aucun contenu disponible.</p>
        @endforelse
    </div>
    <div style="margin-top: 20px;">{{ $publications->links() }}</div>
@endsection