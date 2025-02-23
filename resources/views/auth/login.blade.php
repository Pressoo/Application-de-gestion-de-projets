@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Connexion</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Adresse e-mail :</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit">Se connecter</button>
        </div>
    </form>
    <p>Pas encore de compte ? <a href="{{ route('register') }}">Inscrivez-vous</a></p>
</div>
@endsection
