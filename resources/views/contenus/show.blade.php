<div style="margin-bottom: 20px;">
    <a href="{{ route('contenus.edit', $publication) }}">Modifier cette publication</a>
    <form action="{{ route('contenus.destroy', $publication) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Etes-vous sûr ?')">Supprimer</button>
    </form>
</div>