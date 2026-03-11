<article class="card product-card">
    <div class="product-card__image">
        <img src="{{ asset('images/livre-test.jpg') }}" alt="Livre Ouvert" loading="lazy">
    </div>
    <div class="product-card__body">
        <h3 class="product-card__title">Titre du Livre 1</h3>
        <p class="product-card__price">€9.99</p>
        <div class="product-card__button">
            <a href="#" class="button button--primary button__card">Ajouter au Panier</a>
            <a href="{{ url('/product') }}" class="button button--secondary button__card">Voir Produit</a>
        </div>
    </div>
</article>