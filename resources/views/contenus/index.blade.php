@extends('layouts.app')

@section('titre', 'Contenus')

@section('contenu')
    <h1>Contenus multimédias</h1>
    
    @auth
        <a href="{{ route('contenus.create') }}">+ Ajouter une publication</a>
    @endauth
    
    <div style="margin-top: 20px; display: flex; flex-wrap: wrap; gap: 20px;">
        @forelse ($publications as $publication)
            <x-carte titre="{{ $publication->titre }}">
                
                {{-- HNA EL SORSE: L'IMAGE TET7AT HNA W MICH FI L'ATTRIBUT TITRE --}}
                @if ($publication->image)
                    <img src="{{ Storage::url($publication->image) }}" alt="{{ $publication->titre }}" style="max-width: 100%; border-radius: 5px; margin-bottom: 10px;">
                @endif
                
                <p>{{ Str::limit($publication->contenu, 100) }}</p>
                <small>Catégorie: <strong>{{ $publication->categorie->nom }}</strong> | Auteur: {{ $publication->auteur->name }}</small><br><br>
                
                <a href="{{ route('contenus.show', $publication->id) }}">Lire la suite</a>
                
                @can('update', $publication)
                    | <a href="{{ route('contenus.edit', $publication) }}">Modifier</a>
                @endcan

                @can('delete', $publication)
                    <form action="{{ route('contenus.destroy', $publication) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Etes-vous sûr ?')">Supprimer</button>
                    </form>
                @endcan
            </x-carte>
        @empty
            <p>Aucun contenu disponible.</p>
        @endforelse
    </div>
    <div style="margin-top: 20px;">{{ $publications->links() }}</div>
@endsection