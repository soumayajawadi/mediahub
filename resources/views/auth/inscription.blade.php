@extends('layouts.app')
@section('titre', 'Inscription')
@section('contenu')
    <h1>Inscription</h1>
    <form method="POST" action="{{ route('inscription') }}">
        @csrf
        <div><label>Nom :</label><br><input type="text" name="name" value="{{ old('name') }}" required></div>
        @error('name') <span style="color:red">{{ $message }}</span> @enderror
        
        <div><label>Email :</label><br><input type="email" name="email" value="{{ old('email') }}" required></div>
        @error('email') <span style="color:red">{{ $message }}</span> @enderror
        
        <div><label>Mot de passe :</label><br><input type="password" name="password" required></div>
        @error('password') <span style="color:red">{{ $message }}</span> @enderror
        
        <div><label>Confirmer mot de passe :</label><br><input type="password" name="password_confirmation" required></div>
        
        <button type="submit" style="margin-top:10px;">S'inscrire</button>
    </form>
@endsection