@extends ('layouts.app')

@section ('body-class', 'body--with-lines body--content-centered')

@section ('content')
    <div class="form-card">
        <button class="button button--dark button--circle form-card__back">←</button>

        <h1 class="form-card__title">Register</h1>

        <form class="form" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form__group">
                <label for="username-register" class="form__label">Nom d'utilisateur :</label>

                <div class="form__input-wrapper">
                    <span class="form__icon">👤</span>

                    <input
                        id="username-register"
                        name="name"
                        type="text"
                        class="form__input"
                        value="{{ old('name') }}"
                        required
                        autocomplete="name"
                    />
                </div>

                @error ('name')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div class="form__group">
                <label for="email-register" class="form__label">email :</label>

                <div class="form__input-wrapper">
                    <span class="form__icon">✉️</span>

                    <input
                        id="email-register"
                        name="email"
                        type="email"
                        class="form__input"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                    />
                </div>

                @error ('email')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div class="form__group">
                <label for="mdp-register" class="form__label">Mot de Passe :</label>

                <div class="form__input-wrapper">
                    <span class="form__icon">🔑</span>

                    <input
                        id="mdp-register"
                        name="password"
                        type="password"
                        class="form__input"
                        required
                        autocomplete="new-password"
                    />

                    <span class="form__icon-right">afficher</span>
                </div>

                @error ('password')
                    <div>{{ $message }}</div>
                @enderror

                <label for="mdp-register-verif" class="form__label"> Confirmation de mot de Passe : </label>

                <div class="form__input-wrapper">
                    <span class="form__icon">🔑</span>

                    <input
                        id="mdp-register-verif"
                        name="password_confirmation"
                        type="password"
                        class="form__input"
                        required
                        autocomplete="new-password"
                    />

                    <span class="form__icon-right">afficher</span>
                </div>
            </div>

            <a href="{{ route('login') }}" class="form__register"> Deja un Compte ? Se Connecter ! </a>

            <button type="submit" class="button button--primary">S'inscrire</button>
        </form>
    </div>

@endsection