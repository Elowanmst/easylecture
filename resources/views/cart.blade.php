@extends('layouts.app')


@section('content')

<div class="container">

    <h1>
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="9" cy="21" r="1"></circle>
            <circle cx="20" cy="21" r="1"></circle>
            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
        </svg>
        Mon Panier
    </h1>
    <div class="cart-layout">

        <section class="cart-items">
            <article class="cart-item card">
                <img src="" alt="article" class="cart-item-img">
                <div class="cart-item-details">
                    <div class="cart-item-info">
                        <p class="cart-item-name">| article |</p>
                        <p class="cart-item-price">X.XX€</p>
                    </div>
                    <div class="cart-item-qty">
                        <p>Quantité</p>
                        <div class="qty-controls">
                            <button>−</button>
                            <span>X</span>
                            <button>+</button>
                        </div>
                    </div>
                    <div class="cart-item-total">
                        <span>Total</span>
                        <p>X.XX€</p>
                    </div>
                    <button class="cart-item-delete">🗑</button>
                </div>    
            </article>
        </section>

        <div class="cart-summary card">
            <h2>Récapitulatif</h2>
            <div class="summary-line">
                <span>Sous total :</span>
                <span>X.XX€</span>
            </div>
            <hr>
            <div class="summary-line">
                <span>Livraison :</span>
                <span>X.XX€</span>
            </div>
            <hr>
            <div class="summary-line">
                <span>Total :</span>
                <span>X.XX€</span>
            </div>
            <hr>
            <a href="{{ url('/') }}" class="btn btn-secondary">← Continuer mes achats</a>
            <a href="#" class="btn btn-primary">Commander</a>
        </div>

    </div>

    <a href="{{ url('/') }}" class="btn">Retour à la boutique</a>

</div>

@endsection