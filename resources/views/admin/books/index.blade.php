@extends('layouts.admin')

@section('admin-title', 'Gestion des Livres')

@section('admin-content')

<div class="admin-books-header">
    <h2>Tous les livres</h2>
    <a href="{{ route('books.create') }}" class="button button--primary">+ Créer un livre</a>
</div>

<div style="overflow-x: auto;">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Genre</th>
                <th>Âge</th>
                <th>Prix</th>
                <th style="text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>
                        @if ($book->image)
                            <img src="{{ asset($book->image) }}" alt="{{ $book->title }}" loading="lazy">
                        @else
                            <span style="color: #666;">-</span>
                        @endif
                    </td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>{{ $book->age_range }}</td>
                    <td>{{ $book->price > 0 ? '€' . number_format($book->price, 2) : 'Gratuit' }}</td>
                    <td>
                        <div class="admin-actions">
                            <a href="{{ route('books.edit', $book) }} "class="button button--secondary button--compact">✏️ Éditer</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button button--primary button--compact ">🗑️ Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="admin-table-empty">Aucun livre trouvé</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if ($books->hasPages())
    <div class="admin-pagination">
        {{ $books->links() }}
    </div>
@endif

@endsection