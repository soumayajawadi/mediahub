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
    </main>

    <!-- Footer -->
    @include('partials.pied-de-page')
</body>
</html>