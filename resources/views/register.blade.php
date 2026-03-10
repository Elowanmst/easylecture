@extends('layouts.app')

@section('content')

<div class="form-card">
    <button class="button button--dark button--circle form-card__back">←</button>
    <h1 class="form-card__title">Register</h1>

    <form class="form">
        <div class="form__group">
            <label class="form__label">Nom d'utilisateur :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">👤</span>
                <input type="text" class="form__input">
            </div>
        </div>

        <div class="form__group">
            <label class="form__label">email :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">✉️</span>
                <input type="email" class="form__input">
            </div>
        </div>

        <div class="form__group">
            <label class="form__label">telephone :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">📞</span>
                <input type="tel" class="form__input">
            </div>
        </div>

        <div class="form__group">
            <label class="form__label">Mot de Passe :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">🔑</span>
                <input type="password" class="form__input">
                <span class="form__icon-right">afficher</span>
            </div>

            <label class="form__label">Confirmation de mot de Passe :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">🔑</span>
                <input type="password" class="form__input">
                <span class="form__icon-right">afficher</span>
            </div>

            <a href="#" class="form__link">Mot de Passe Oublié ?</a>
        </div>

        <a href="#" class="form__register">Deja un Compte ? Se Connecter !</a>

        <button type="submit" class="button button--primary">S'inscrire</button>
    </form>
</div>

@endsection