@extends ('layouts.app')

@section ('body-class', 'body--with-lines body--content-centered')

@section ('content')
    <div class="form-card">
        <button class="button button--dark button--circle form-card__back">←</button>

        <h1 class="form-card__title">Login</h1>

        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form__group">
                <label for="username" class="form__label"> Nom Utilisateur : </label>

                <div class="form__input-wrapper">
                    <span class="form__icon">👤</span>

                    <input
                        type="email"
                        id="username"
                        name="email"
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
                <label for="mdp-login" class="form__label"> Mot de Passe : </label>

                <div class="form__input-wrapper">
                    <span class="form__icon">🔑</span>

                    <input
                        id="mdp-login"
                        name="password"
                        type="password"
                        class="form__input"
                        required
                        autocomplete="current-password"
                    />

                    <span class="form__icon-right">afficher</span>
                </div>

                @error ('password')
                    <div>{{ $message }}</div>
                @enderror

                <a href="{{ url('/newmdp') }}" class="form__link"> Mot de Passe Oublié ? </a>
            </div>

            <a href="{{ route('register') }}" class="form__register"> Pas de Compte ? Créer-en un ! </a>

            <button type="submit" class="button button--primary">Se Connecter</button>
        </form>
    </div>

@endsection