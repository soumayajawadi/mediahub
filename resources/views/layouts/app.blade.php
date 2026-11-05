<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titre', 'MediaHub')</title>
    <!-- Lien CSS (bech nsna3ouh fi l'akhir) -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Navbar -->
    @include('partials.navigation')
    
    <!-- Contenu mte3 el pages -->
    <main class="conteneur">
        @yield('contenu')
        @if (session('succes'))
    <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
        {{ session('succes') }}
    </div>
@endif
    </main>

    <!-- Footer -->
    @include('partials.pied-de-page')
</body>
</html>