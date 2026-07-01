@extends ('layouts.app')

@section ('content')
    <div class="container">
        <h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            Mon Panier
        </h1>

        @if (session('cart_message'))
            <p class="cart-message">{{ session('cart_message') }}</p>
        @endif

        @if ($items->isEmpty())
            <p class="cart-empty">Votre panier est vide.</p>
            <a href="{{ url('/boutique') }}" class="button button--primary">Découvrir la boutique</a>
        @else
            <div class="cart-layout">
                <section class="cart-items">
                    @foreach ($items as $item)
                        <article class="cart-item card">
                            <img
                                src="{{ asset($item['book']->image ?? 'images/livre-test.jpg') }}"
                                alt="{{ $item['book']->title }}"
                                class="cart-item-img"
                            />
                            <div class="cart-item-details">
                                <div class="cart-item-info">
                                    <p class="product-card__title">{{ $item['book']->title }}</p>
                                    <p class="product-card__author">{{ $item['book']->author }}</p>
                                </div>

                                <div class="cart-item-qty">
                                    <p>Quantité</p>
                                    <div class="qty-controls">
                                        <form method="POST" action="{{ route('cart.update', $item['book']) }}">
                                            @csrf
                                            @method ('PATCH')
                                            <input type="hidden" name="action" value="decrease" />
                                            <button type="submit" class="Add-Delete">-</button>
                                        </form>
                                        <span>{{ $item['quantity'] }}</span>
                                        <form method="POST" action="{{ route('cart.update', $item['book']) }}">
                                            @csrf
                                            @method ('PATCH')
                                            <input type="hidden" name="action" value="increase" />
                                            <button type="submit" class="Add-Delete">+</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="cart-item-total">
                                    <span>Total</span>
                                    <p>{{ number_format($item['total'], 2) }}€</p>
                                </div>

                                <form method="POST" action="{{ route('cart.remove', $item['book']) }}">
                                    @csrf
                                    @method ('DELETE')
                                    <button type="submit" class="cart-item-delete">🗑</button>
                                </form>
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

                    <hr />

                    <div class="summary-line">
                        <span>Livraison :</span>
                        <span>{{ $shipping > 0 ? number_format($shipping, 2) . '€' : 'Gratuite' }}</span>
                    </div>

                    <hr />

                    <div class="summary-line">
                        <span>Total :</span>
                        <span>{{ number_format($total, 2) }}€</span>
                    </div>

                    <hr />

                    <div class="cart__btn">
                        <a href="{{ url('/boutique') }}" class="button button--secondary">Continuer mes achats</a>
                        <form method="POST" action="{{ route('cart.checkout') }}">
                            @csrf
                            <button type="submit" class="button button--success">Commander</button>
                        </form>
                    </div>
                </div>
            </div>

        @endif
    </div>

@endsection