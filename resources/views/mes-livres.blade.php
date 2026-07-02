@extends ('layouts.app')

@section ('content')
    <div class="container--large">
        <h1 class="shop-title">Mes livres</h1>

        <div class="shop">
            <p class="shop-description">Retrouvez ici tous les livres que vous avez achetés. Cliquez sur un livre pour le lire directement dans votre navigateur.</p>

            <section class="shop-products">
                @forelse ($books as $book)
                    <article class="card product-card">
                        <div class="product-card__image">
                            <img src="{{ asset($book->image) }}" alt="{{ $book->title }}" loading="lazy" />
                            <span class="featured__badge">{{ $book->genre }}</span>
                        </div>

                        <div class="product-card__body">
                            <h3 class="product-card__title">{{ $book->title }}</h3>
                            <p class="product-card__description">{{ $book->author }}</p>

                            <div class="product-card__button">
                                @if ($book->pdf)
                                    <a
                                        href="{{ route('library.read', $book) }}"
                                        class="button button--primary button__card"
                                        >Lire</a
                                    >
                                @else
                                    <span class="button button--secondary button__card" aria-disabled="true"
                                        >Bientôt disponible</span
                                    >
                                @endif
                            </div>
                        </div>
                    </article>
                @empty
                    <p class="shop-empty">Vous n'avez pas encore de livre. <a href="{{ url('/boutique') }}">Découvrir la boutique</a>.</p>
                @endforelse
            </section>
        </div>
    </div>

@endsection