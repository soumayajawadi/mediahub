@extends('layouts.app')

@section('titre', $publication->titre)

@section('contenu')
    <h1>{{ $publication->titre }}</h1>
    <p><strong>Catégorie:</strong> {{ $publication->categorie->nom }} | <strong>Auteur:</strong> {{ $publication->auteur->name }}</p>
    
    <div style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
        {{ $publication->contenu }}
    </div>

    <div style="margin-bottom: 20px;">
        <a href="{{ route('contenus.edit', $publication) }}">Modifier cette publication</a>
        <form action="{{ route('contenus.destroy', $publication) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Etes-vous sûr ?')" style="color:red; background:none; border:none; text-decoration:underline;">Supprimer</button>
        </form>
    </div>

    <h3>Commentaires ({{ $publication->commentaires->count() }})</h3>
    @forelse ($publication->commentaires as $commentaire)
        <div style="border-bottom: 1px solid #ccc; padding: 10px 0;">
            <strong>{{ $commentaire->auteur->name }}:</strong>
            <p>{{ $commentaire->contenu }}</p>
        </div>
    @empty
        <p>Aucun commentaire pour le moment.</p>
    @endforelse
@endsection