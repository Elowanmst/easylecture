<article class="card product-card">
    <div class="product-card__image">
        <img src="{{ asset($book->image ?? 'images/livre-test.jpg') }}" alt="{{ $book->title }}" loading="lazy">
        <span class="featured__badge">{{ $book->genre }}</span>
    </div>
    <div class="product-card__body">
        <h3 class="product-card__title">{{ $book->title }}</h3>

        <p class="product-card__description">{{ $book->description }}</p>

        <p class="product-card__price">{{ $book->price > 0 ? '€' . number_format($book->price, 2) : 'Gratuit' }}</p>

        <div class="product-card__button">

            <form method="POST" action="{{ route('cart.add', $book) }}">
                @csrf
                <button type="submit" class="button button--primary button__card">Ajouter au Panier</button>
            </form>

            <a href="{{ route('product.show', $book) }}" class="button button--secondary button__card">Voir Produit</a>
            
        </div>
    </div>
</article>
