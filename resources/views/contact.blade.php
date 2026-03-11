@extends('layouts.app')


@section('content')


<div class="form-card">
    <button class="button button--dark button--circle form-card__back">←</button>
    <h1 class="form-card__title">Contact</h1>

    <form class="form">
        <div class="form__group">
            <label class="form__label">Nom :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">👤</span>
                <input type="text" class="form__input">
            </div>
        </div>
        <div class="form__group">
            <label class="form__label">Email :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">📧</span>
                <input type="email" class="form__input">
            </div>
        </div>

        <div class="form__group">
            <label class="form__label">Message :</label>
            <div class="form__input-wrapper">
                <span class="form__icon">✉️</span>
                <textarea class="form__input" rows="4"></textarea>
            </div>
        </div>

        <button type="submit" class="button button--primary">Envoyer</button>
    </form>
</div>

@endsection