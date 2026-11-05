<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titre', 'MediaHub')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Navbar -->
    @include('partials.navigation')
    
    <!-- Contenu mte3 el pages -->
    <main class="conteneur">
        
        <!-- MESSAGE DE SUCCES (A5DHER) -->
        @if (session('succes'))
            <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                {{ session('succes') }}
            </div>
        @endif

        <!-- MESSAGE D'ERREUR (A7MER) -->
        @if (session('erreur'))
            <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                {{ session('erreur') }}
            </div>
        @endif

        <!-- HNA YET7AT EL CONTENU MT3 LES PAGES -->
        @yield('contenu')
        
    </main>

    <!-- Footer -->
    @include('partials.pied-de-page')
</body>
</html>