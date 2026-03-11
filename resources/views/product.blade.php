@extends('layouts.app')

@section('content')
    <div class="product">
        
        <section class="container">
            <h1 class="product__title">livre 1</h1>
            <article class="product__description">
                <div class="product__image">
                    <img src="{{ asset('images/livre-test.jpg') }}">
                </div>
                <div class="card">
                    <p class="product__description">c'est la description </p>
                    <hr>
                    <p class="product__price">20€</p>
                    <button type="submit" class="button button--primary button__card">Ajouter au panier</button>
                </div>
            </article>
        </section>
    </div>
@endsection