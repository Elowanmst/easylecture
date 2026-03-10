@extends('layouts.app')

@section('content')

<div class="form-card">
    <button class="button button--dark button--circle form-card__back">←</button>
    <h1 class="form-card__title">Mot de passe oublier ?</h1>

    <form class="form">
        <div class="form__group">
            <label class="form__label">email :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">👤</span>
                <input type="text" class="form__input">
            </div>
        </div>

        <a href="#" class="form__register">Retour à la connexion</a>

        <button type="submit" class="button button--primary">envoyé le mail de restauration du mot de passe</button>
    </form>
</div>

@endsection