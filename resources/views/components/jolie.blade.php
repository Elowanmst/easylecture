@extends('layouts.app')

@section('content')

{{-- ===================== HERO ===================== --}}
<section class="hero">
    <div class="hero__content">
        <p class="hero__tag">📚 La librairie numérique</p>
        <h1 class="hero__title">
            Votre prochaine lecture <br>
            vous <span class="text-highlight">attend ici</span>
        </h1>
        <p class="hero__subtitle">Des milliers de livres livrés chez vous en quelques clics.</p>
        <div class="button__list">
            <a href="{{ url('/boutique') }}" class="button button--primary button--big">Explorer la boutique</a>
            <a href="{{ url('/') }}" class="button button--transparent">En savoir plus</a>
        </div>
    </div>
    <div class="hero__visual">
        <div class="hero__book-stack">
            <img src="{{ asset('images/livre-test.jpg') }}" alt="Livre" class="hero__book hero__book--front">
            <div class="hero__book hero__book--shadow"></div>
        </div>
        <div class="hero__badge">
            <span class="hero__badge-number">2K+</span>
            <span class="hero__badge-label">Livres disponibles</span>
        </div>
    </div>
</section>

{{-- ===================== STATS ===================== --}}
<section class="stats">
    <div class="stats__item">
        <span class="stats__number text-highlight">2 000+</span>
        <span class="stats__label">Livres</span>
    </div>
    <div class="stats__separator"></div>
    <div class="stats__item">
        <span class="stats__number text-highlight">50+</span>
        <span class="stats__label">Catégories</span>
    </div>
    <div class="stats__separator"></div>
    <div class="stats__item">
        <span class="stats__number text-highlight">10K+</span>
        <span class="stats__label">Clients satisfaits</span>
    </div>
    <div class="stats__separator"></div>
    <div class="stats__item">
        <span class="stats__number text-highlight">24h</span>
        <span class="stats__label">Livraison express</span>
    </div>
</section>

{{-- ===================== FEATURED ===================== --}}
<section class="featured">
    <div class="featured__header">
        <h2 class="featured__title">Coups de <span class="text-highlight">cœur</span></h2>
        <a href="{{ url('/boutique') }}" class="button button--secondary">Voir tout →</a>
    </div>
    <div class="featured__grid">
        @foreach([1,2,3,4] as $i)
        <article class="product-card card featured__card">
            <div class="product-card__image">
                <img src="{{ asset('images/livre-test.jpg') }}" alt="Livre">
                <span class="featured__badge">Nouveau</span>
            </div>
            <div class="product-card__body">
                <h3 class="product-card__title">Titre du livre {{ $i }}</h3>
                <p class="product-card__author">Auteur inconnu</p>
                <p class="product-card__price text-highlight">9,99 €</p>
                <a href="#" class="button button--primary button__card">Ajouter au panier</a>
            </div>
        </article>
        @endforeach
    </div>
</section>

{{-- ===================== BANNER PROMO ===================== --}}
<section class="promo-banner">
    <div class="promo-banner__content">
        <p class="promo-banner__tag">⚡ Offre limitée</p>
        <h2 class="promo-banner__title">-20% sur votre <span class="text-highlight">première commande</span></h2>
        <p class="promo-banner__subtitle">Utilisez le code <strong>BIENVENUE</strong> à la commande</p>
        <a href="{{ url('/boutique') }}" class="button button--success button--big">J'en profite</a>
    </div>
</section>

{{-- ===================== CATEGORIES ===================== --}}
<section class="categories">
    <h2 class="categories__title">Parcourir par <span class="text-highlight">catégorie</span></h2>
    <div class="categories__grid">
        @foreach(['🔬 Science', '💻 Tech', '🎭 Roman', '🧠 Philo', '🎨 Art', '📖 Histoire'] as $cat)
        <a href="#" class="categories__item card">{{ $cat }}</a>
        @endforeach
    </div>
</section>

{{-- ===================== TESTIMONIALS ===================== --}}
<section class="testimonials">
    <h2 class="testimonials__title">Ils nous font <span class="text-highlight">confiance</span></h2>
    <div class="testimonials__grid">
        @foreach([
            ['Lucie M.', '"Une expérience incroyable, livraison ultra rapide !"', '⭐⭐⭐⭐⭐'],
            ['Thomas R.', '"Sélection de livres vraiment top, je recommande."', '⭐⭐⭐⭐⭐'],
            ['Amina K.', '"Site très intuitif, parfait pour les amateurs de lecture."', '⭐⭐⭐⭐'],
        ] as [$name, $quote, $stars])
        <div class="testimonials__card card">
            <p class="testimonials__stars">{{ $stars }}</p>
            <p class="testimonials__quote">{{ $quote }}</p>
            <p class="testimonials__author">— {{ $name }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- ===================== CTA FINAL ===================== --}}
<section class="cta">
    <h2 class="cta__title">Prêt à découvrir votre<br> prochain <span class="text-highlight">coup de cœur</span> ?</h2>
    <a href="{{ url('/boutique') }}" class="button button--primary button--big">Voir la boutique</a>
</section>

@endsection