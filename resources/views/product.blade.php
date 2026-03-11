@extends('layouts.app')

@section('content')
    <div class="product">
        
        <section class="container">
            <h1 class="product__title">livre 1</h1>
            {{-- <meta property="og:title" class="product__title" content="livre 1" /> --}}
            <article class="product__description">
                <div class="product__image">
                    <img src="{{ asset('images/livre-test.jpg') }}">
                    {{-- <meta property="og:image" class="product__image" content="{{ asset('images/livre-test.jpg') }}" /> --}}
                </div>
                <div class="card">
                    <p class="product__description">c'est la description </p>
                    {{-- <meta property="og:description" class="product__description" content="c'est la description" /> --}}
                    <hr>
                    <p class="product__price">20€</p>
                    {{-- <meta property="og:price:amount" class="product__price" content="20" />
                    <meta property="og:price:currency" content="EUR" /> --}}
                    <button type="submit" class="button button--primary button__card">Ajouter au panier</button>
                </div>
            </article>
        </section>
    </div>
@endsection