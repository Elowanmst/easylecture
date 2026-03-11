@extends('layouts.app')

@section('body-class', 'body--with-lines body--content-centered')

@section('content')

<div class="form-card">
    <button class="button button--dark button--circle form-card__back">←</button>
    <h1 class="form-card__title">Register</h1>

    <form class="form">
        <div class="form__group">
            <label for="username-register" class="form__label">Nom d'utilisateur :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">👤</span>
                <input id="username-register" type="text" class="form__input">
            </div>
        </div>

        <div class="form__group">
            <label for="email-register" class="form__label">email :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">✉️</span>
                <input id="email-register" type="email" class="form__input">
            </div>
        </div>

        <div class="form__group">
            <label for="tel" class="form__label">telephone :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">📞</span>
                <input id="tel" type="tel" class="form__input">
            </div>
        </div>

        <div class="form__group">
            <label for="mdp-register" class="form__label">Mot de Passe :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">🔑</span>
                <input id="mdp-register" type="password" class="form__input">
                <span class="form__icon-right">afficher</span>
            </div>

            <label for="mdp-register-verif" class="form__label">Confirmation de mot de Passe :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">🔑</span>
                <input id="mdp-register-verif" type="password" class="form__input">
                <span class="form__icon-right">afficher</span>
            </div>
        </div>

        <a href="{{ url('/login') }}" class="form__register">Deja un Compte ? Se Connecter !</a>

        <button type="submit" class="button button--primary">S'inscrire</button>
    </form>
</div>

@endsection