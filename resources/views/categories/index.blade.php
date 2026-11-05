@extends('layouts.app')

@section('titre', 'Catégories')

@section('contenu')
    <h1>Liste des catégories</h1>
    <a href="{{ route('categories.create') }}" style="display: inline-block; margin-bottom: 15px;">+ Ajouter une catégorie</a>
    
    <ul style="margin-top: 20px; list-style-type: none; padding: 0;">
        @forelse($categories as $categorie) <!-- HNA RAKKEZ: $categorie b ie -->
            <li style="margin-bottom: 15px; background: white; padding: 10px; border-radius: 5px; border: 1px solid #ddd;">
                <strong>{{ $categorie->nom }}</strong> ({{ $categorie->publications_count }} publications)
                
                <div style="margin-top: 5px;">
                    <a href="{{ route('categories.edit', $categorie) }}" style="margin-right: 10px; color: blue;">Modifier</a>
                    
                    <form action="{{ route('categories.destroy', $categorie) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Etes-vous sûr ?')" style="color: red; cursor: pointer; background: none; border: none; padding: 0; text-decoration: underline;">
                            Supprimer
                        </button>
                    </form>
                </div>
            </li>
        @empty
            <p>Aucune catégorie n'a été trouvée.</p>
        @endforelse
    </ul>
@endsection