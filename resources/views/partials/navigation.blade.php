<nav class="navigation" style="display:flex; gap:15px; align-items:center; background: #1f2937; padding: 1rem;">
    <a href="{{ route('accueil') }}" style="color: white; text-decoration: none; font-weight: bold;">Accueil - MediaHub</a>
    <a href="{{ route('contenus.index') }}" style="color: white; text-decoration: none;">Contenus</a>
    <a href="{{ route('a-propos') }}" style="color: white; text-decoration: none;">À propos</a>
    
    <div style="margin-left: auto;">
        @guest
            <a href="{{ route('connexion') }}" style="color: white; margin-right:10px; text-decoration: none;">Connexion</a>
            <a href="{{ route('inscription') }}" style="color: white; text-decoration: none;">Inscription</a>
        @endguest
        
        @auth
            <span style="margin-right:10px; color:white;">Bonjour {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('deconnexion') }}" style="display:inline;">
                @csrf
                <button type="submit" style="background:#ef4444; border:none; color:white; padding:5px 10px; border-radius:5px; cursor:pointer;">Déconnexion</button>
            </form>
        @endauth
    </div>
</nav>