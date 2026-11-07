<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    // Vue d'inscription
    public function create()
    {
        return view('auth.inscription');
    }

    // Traitement de l'inscription
    public function store(StoreUserRequest $request)
    {
        // Laravel y7ached el password automatiquement itha 5demna m3a User::create w l'cast mawjoud
        $user = User::create($request->validated());
        Auth::login($user);
        return redirect()->route('accueil')->with('succes', 'Bienvenue sur MediaHub !');
    }

    // Vue de connexion
    public function creerConnexion()
    {
        return view('auth.connexion');
    }

    // Traitement de la connexion
    public function connecter(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Identifiants incorrects.']);
        }

        $request->session()->regenerate();
        return redirect()->intended(route('accueil'));
    }

    // Déconnexion
    public function deconnecter(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('accueil');
    }
}