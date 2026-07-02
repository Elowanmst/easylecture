@extends ('layouts.app')

@section ('content')
    <div class="container--large reader">
        <div class="reader__head">
            <a href="{{ route('library.index') }}" class="button button--secondary">&larr; Mes livres</a>
            <h1 class="reader__title">{{ $book->title }}</h1>
            <a href="{{ asset('storage/' . $book->pdf) }}" target="_blank" rel="noopener" class="button button--primary"
                >Ouvrir en plein écran</a
            >
        </div>

        <div class="reader__viewer">
            <iframe
                src="{{ asset('storage/' . $book->pdf) }}#toolbar=1&view=Fit"
                title="{{ $book->title }}"
                loading="lazy"
            >
                <p>Votre navigateur ne peut pas afficher le PDF. <a href="{{ asset('storage/' . $book->pdf) }}" target="_blank" rel="noopener">Cliquez ici pour le télécharger</a>.</p>
            </iframe>
        </div>
    </div>

@endsection