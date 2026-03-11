@extends('layouts.app')

@section('body-class', 'body--with-lines body--content-centered')

@section('content')

<div class="form-card">
    <button class="button button--dark button--circle form-card__back">←</button>
    <h1 class="form-card__title">Login</h1>

    <form class="form">
        <div class="form__group">
            <label for="username" class="form__label">Nom Utilisateur :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">👤</span>
                <input type="text" id="username" class="form__input">
            </div>
        </div>

        <div class="form__group">
            <label for="mdp-login"class="form__label">Mot de Passe :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">🔑</span>
                <input id="mdp-login" type="password" class="form__input">
                <span class="form__icon-right">afficher</span>
            </div>
            <a href="{{ url('/newmdp') }}" class="form__link">Mot de Passe Oublié ?</a>
        </div>

        <a href="{{ url('/register') }}" class="form__register">Pas de Compte ? Créer-en un !</a>

        <button type="submit" class="button button--primary">Se Connecter</button>
    </form>
</div>

@endsection