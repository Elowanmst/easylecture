@extends('layouts.app')

@section('body-class', 'body--with-lines body--content-centered')

@section('content')

<div class="form-card">
    <button class="button button--dark button--circle form-card__back">←</button>
    <h1 class="form-card__title">Mot de passe oublier ?</h1>
    <p class="form__label">Entrez votre adresse e-mail pour recevoir un lien de réinitialisation.</p>

    <form class="form">
        <div class="form__group">
            <label for="email-forgetmdp" class="form__label">email :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">👤</span>
                <input id="email-forgetmdp" type="text" class="form__input">
            </div>
        </div>

        <a href="#" class="form__register">Retour à la connexion</a>

        <button type="submit" class="button button--primary">envoyé le mail</button>
    </form>
</div>

@endsection