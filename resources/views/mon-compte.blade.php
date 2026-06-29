@extends('layouts.app')

@section('content')

<div class="container account">

    <h1>
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
        </svg>
        Mon Compte
    </h1>

    <div class="account-layout">

        <aside class="account-info card">
            <h2>Mes informations</h2>

            @if (session('status') === 'profile-information-updated')
                <div class="account-info__success">Vos informations ont bien été mises à jour.</div>
            @endif

            <form method="POST" action="{{ route('user-profile-information.update') }}">
                @csrf
                @method('PUT')

                <div class="account-info__field">
                    <label for="name" class="account-info__label">Nom</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        class="account-info__input"
                        value="{{ old('name', $user->name) }}"
                        required
                        autocomplete="name"
                    >
                    @error('name', 'updateProfileInformation')
                        <div class="account-info__error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="account-info__field">
                    <label for="email" class="account-info__label">Email</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        class="account-info__input"
                        value="{{ old('email', $user->email) }}"
                        required
                        autocomplete="email"
                    >
                    @error('email', 'updateProfileInformation')
                        <div class="account-info__error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="button button--secondary">Mettre à jour mes informations</button>
            </form>

            <a href="{{ route('library.index') }}" class="button button--primary">Mes livres</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="button button--secondary">Se déconnecter</button>
            </form>
        </aside>

        <section class="account-orders">
            <h2>Mes commandes</h2>

            @if (empty($orders) || $orders->isEmpty())
                <p class="account-orders__empty">Vous n'avez pas encore passé de commande.</p>
                <a href="{{ url('/boutique') }}" class="button button--primary">Découvrir la boutique</a>
            @else
                <div class="account-orders__list">
                    @foreach ($orders as $order)
                    <article class="order-card card">
                        <div class="order-card__head">
                            <div class="order-card__ref">
                                <p class="order-card__number">Commande #{{ $order->id }}</p>
                                <p class="order-card__date">{{ $order->created_at->format('d/m/Y à H:i') }}</p>
                            </div>
                            <span class="order-status order-status--{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                        </div>

                        <ul class="order-card__items">
                            @foreach ($order->items as $item)
                            <li>
                                <span>{{ $item->quantity }} x {{ $item->title }}</span>
                                <span>{{ number_format($item->price * $item->quantity, 2) }}€</span>
                            </li>
                            @endforeach
                        </ul>

                        <div class="order-card__foot">
                            <span class="order-card__count">{{ $order->items->sum('quantity') }} article(s)</span>
                            <span class="order-card__total">{{ number_format($order->total, 2) }}€</span>
                        </div>
                    </article>
                    @endforeach
                </div>
            @endif
        </section>

    </div>
</div>

@endsection
