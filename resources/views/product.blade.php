@extends('layouts.app')

@section('content')

    <div class="product">
        <section class="container">

            @if (session('cart_message'))
                <p class="cart-message">{{ session('cart_message') }}</p>
            @endif

            <article class="product__layout">
                <div class="product__image">
                    <img src="{{ asset($book->image ?? 'images/livre-test.jpg') }}" alt="{{ $book->title }}">
                </div>
                <div class="card product__card">
                    <span class="featured__badge">{{ $book->genre }}</span>
                    <h1 class="product__title">{{ $book->title }}</h1>
                    <p class="product__author">par {{ $book->author }}</p>
                    <hr class="product__divider">
                    <p class="product__text">{{ $book->description }}</p>
                    <p class="product__price">{{ $book->price > 0 ? '€' . number_format($book->price, 2) : 'Gratuit' }}</p>
                    <form method="POST" action="{{ route('cart.add', $book) }}">
                        @csrf
                        <button type="submit" class="button button--primary button__card">Ajouter au Panier</button>
                    </form>
                </div>
            </article>
        </section>
    </div>
@endsection