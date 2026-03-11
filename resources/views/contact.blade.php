@extends('layouts.app')

@section('body-class', 'body--with-lines body--content-centered')

@section('content')


<div class="form-card">
    <button class="button button--dark button--circle form-card__back">←</button>
    <h1 class="form-card__title">Contact</h1>

    <form class="form">
        <div class="form__group">
            <label for="username-contact" class="form__label">Nom :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">👤</span>
                <input id="username-contact" type="text" class="form__input">
            </div>
        </div>
        <div class="form__group">
            <label for="email-contact" class="form__label">Email :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">📧</span>
                <input id="email-contact" type="email" class="form__input">
            </div>
        </div>

        <div class="form__group">
            <label for="message" class="form__label">Message :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">✉️</span>
                <textarea id="message" class="form__input" rows="4"></textarea>
            </div>
        </div>

        <button type="submit" class="button button--primary">Envoyer</button>
    </form>
</div>

@endsection