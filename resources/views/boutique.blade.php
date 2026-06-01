@extends('layouts.app')

@section('content')

<div class="container--large">
    @if (session('cart_message'))
        <p class="cart-message">{{ session('cart_message') }}</p>
    @endif
    <h1 class="shop-title">Produits</h1>
    <div class="shop">
        <p class="shop-description">EasyLecture est la plateforme idéale pour découvrir des e-books inspirants et enrichissants. Explorez une sélection de livres numériques pour apprendre, progresser ou simplement vous divertir. Accédez instantanément à une bibliothèque moderne et pratique, pensée pour une lecture simple et accessible partout.</p>
        <div class="shop-filtre">
            <form method="GET" action="{{ url('/boutique') }}" id="shop-filtre-form">
                <ul class="shop-filtre__links">
                    <li><select name="genre" class="shop-filtre__link" onchange="this.form.submit()">
                        <option value="">Tous les genres</option>
                        @foreach (['Fiction', 'Non-Fiction', 'Science-Fiction', 'Fantasy', 'Mystère'] as $genre)
                            <option value="{{ $genre }}" @selected(request('genre') === $genre)>{{ $genre }}</option>
                        @endforeach
                    </select></li>
                    <li><select name="age_range" class="shop-filtre__link" onchange="this.form.submit()">
                        <option value="">Tous les âges</option>
                        @foreach (['-3ans', '3-6ans', '6-10ans', '10-15ans', '15-18ans', '+18ans'] as $age)
                            <option value="{{ $age }}" @selected(request('age_range') === $age)>{{ $age }}</option>
                        @endforeach
                    </select></li>
                    <li><select name="price" class="shop-filtre__link" onchange="this.form.submit()">
                        <option value="">Tous les prix</option>
                        <option value="free" @selected(request('price') === 'free')>Gratuit</option>
                        <option value="under5" @selected(request('price') === 'under5')>Moins de 5€</option>
                        <option value="5to10" @selected(request('price') === '5to10')>5€ - 10€</option>
                        <option value="10to20" @selected(request('price') === '10to20')>10€ - 20€</option>
                    </select></li>
                    @if (request('genre') || request('age_range') || request('price'))
                        <li><a href="{{ url('/boutique') }}" class="shop-filtre__link shop-filtre__link--reset">Réinitialiser</a></li>
                    @endif
                </ul>
            </form>
        </div>
        <section class="shop-products">
            @forelse ($books as $book)
                @include('components.card-product', ['book' => $book])
            @empty
                <p class="shop-empty">Aucun livre ne correspond à ces filtres.</p>
            @endforelse
        </section>
    </div>
</div>

@endsection
