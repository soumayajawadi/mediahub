@extends('layouts.app')
@section('titre', 'Connexion')
@section('contenu')
    <h1>Connexion</h1>
    <form method="POST" action="{{ route('connexion') }}">
        @csrf
        <div><label>Email :</label><br><input type="email" name="email" value="{{ old('email') }}" required></div>
        @error('email') <span style="color:red">{{ $message }}</span> @enderror
        
        <div><label>Mot de passe :</label><br><input type="password" name="password" required></div>
        
        <button type="submit" style="margin-top:10px;">Se connecter</button>
    </form>
@endsection