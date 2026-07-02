@extends('layouts.app')

@section('body-class', 'body--with-lines body--content-centered')

@section('content')

<div class="form-card checkout-page">

    <h1 class="form-card__title">Finalisation de commande</h1>

   
    @auth

        <p class="checkout-text">
            Bonjour <strong>{{ auth()->user()->name }}</strong>, voici votre récapitulatif.
        </p>

  
        <div class="checkout-cart">

            <section class="cart-items">

                @foreach ($items as $item)
                <article class="cart-item card">

                    <img src="{{ asset($item['book']->image ?? 'images/livre-test.jpg') }}"
                         alt="{{ $item['book']->title }}"
                         class="cart-item-img">

                    <div class="cart-item-details">

                        <div class="cart-item-info">
                            <p class="product-card__title">{{ $item['book']->title }}</p>
                            <p class="product-card__author">{{ $item['book']->author }}</p>
                        </div>

                        <div class="cart-item-qty">
                            <p>Quantité</p>
                            <span>{{ $item['quantity'] }}</span>
                        </div>

                        <div class="cart-item-total">
                            <span>Total</span>
                            <p>{{ number_format($item['total'], 2) }}€</p>
                        </div>

                    </div>
                </article>
                @endforeach

            </section>

            <div class="cart-summary card">

                <h2>Récapitulatif</h2>

                <div class="summary-line">
                    <span>Sous total :</span>
                    <span>{{ number_format($subtotal, 2) }}€</span>
                </div>

                <hr>

                <div class="summary-line">
                    <span>Livraison :</span>
                    <span>
                        {{ $shipping > 0 ? number_format($shipping, 2) . '€' : 'Gratuite' }}
                    </span>
                </div>

                <hr>

                <div class="summary-line">
                    <span>Total :</span>
                    <span><strong>{{ number_format($total, 2) }}€</strong></span>
                </div>

            </div>

        </div>

        <a href="{{ route('cart.checkout') }}" class="button button--primary">
        <form method="POST" action="{{ route('cart.checkout') }}">
            @csrf
            <button type="submit" class="button button--primary">
                Payer maintenant
            </button>
        </form>

    @endauth

 
    @guest

        <p class="checkout-text">
            Vous devez être connecté pour finaliser votre commande.
        </p>

        <div class="checkout-actions">

            <a href="{{ route('login') }}" class="button button--primary">
                Se connecter
            </a>

            <a href="{{ route('register') }}" class="button button--primary">
                Créer un compte
            </a>

            <form method="POST" action="{{ route('cart.checkout') }}">
                @csrf
                <button type="submit" class="button button--dark">
                    Continuer en tant qu’invité
                </button>
            </form>

        </div>

    @endguest

</div>

@endsection