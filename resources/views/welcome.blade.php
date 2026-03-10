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
                <button type="submit" class="button button--primary">Commencer à acheter</button>
                <button type="submit" class="button button--secondary">Creer son compte</button>
            </div>

            <div class="welcome__image">
                <img src="{{ asset('images/lectrice.png') }}" alt="Image de lecture">
            </div>
        </div>
    </div>
@endsection
