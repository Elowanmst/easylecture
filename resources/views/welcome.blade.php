
@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="welcome">
            <div class="welcome__text">
                <h1><span class="text-highlight">READING</span> JUST GOT EASIER</h1>
                <p>Accède à ta bibliothèque numérique en un clic. 
                    Découvre des centaines d'<span class="text-highlight">ebooks</span> organisés par genre, 
                    trouve rapidement ce qui t'intéresse, et lis où tu veux, 
                    quand tu veux. Plus de recherches interminables, plus de 
                    complications — juste toi, un livre, et une expérience fluide 
                    pensée pour les lecteurs modernes.
                </p>
                <div class="button__list">
                    <a href="{{ url('/boutique') }}" class="button button--primary button--big">Commencer à acheter</a>
                    <a href="{{ url('/register') }}" class="button button--secondary button--big">Créer son compte</a>
                </div>
                  
            </div>

            <div class="welcome__image">
                <img src="{{ asset('images/lectrice.png') }}" alt="Image de lecture">
            </div>
        </div>
    </div>

    <section class="container mb5">
        <h2 class="mb4">Meilleures Ventes - Best Sellers</h2>
        
        <div class="shop-products">
            @include("components/card-product-best-seller")
            @include("components/card-product-best-seller")
            @include("components/card-product-best-seller")
        </div>
    </section>

@endsection
