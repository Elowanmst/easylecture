@extends('layouts.app')

@section('content')

<div class="container--large">
    <h1 class="shop-title">Produits</h1>
    <div class="shop">
        <p class="shop-description">EasyLecture est la plateforme idéale pour découvrir des e-books inspirants et enrichissants. Explorez une sélection de livres numériques pour apprendre, progresser ou simplement vous divertir. Accédez instantanément à une bibliothèque moderne et pratique, pensée pour une lecture simple et accessible partout.</p>
        <div class="shop-filtre">
            <ul class="shop-filtre__links">
                <li><select class="shop-filtre__link">
                    <option>Fiction</option>
                    <option>Non-Fiction</option>
                    <option>Science-Fiction</option>
                    <option>Fantasy</option>
                    <option>Mystère</option>
                </select></li>
                <li><select class="shop-filtre__link">
                    <option>-3ans</option>
                    <option>3-6ans</option>
                    <option>6-10ans</option>
                    <option>10-15ans</option>
                    <option>15-18ans</option>
                    <option>+18ans</option>
                </select></li>
            </ul>
        </div>
        <section class="shop-products">
            @include("components/card-product")
            @include("components/card-product")
            @include("components/card-product")
            @include("components/card-product")
            @include("components/card-product")
            @include("components/card-product")
            @include("components/card-product")
            @include("components/card-product")
            @include("components/card-product")
            @include("components/card-product")
            @include("components/card-product")
            @include("components/card-product")
            @include("components/card-product")
        </section>
    </div>
</div>

@endsection
    