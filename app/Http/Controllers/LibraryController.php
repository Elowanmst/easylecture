<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    /**
     * Liste des livres que l'utilisateur a achetés (commandes payées).
     */
    public function index()
    {
        $books = Book::whereIn('id', $this->purchasedBookIds())
            ->orderBy('title')
            ->get();

        return view('mes-livres', ['books' => $books]);
    }

    /**
     * Visionneuse PDF d'un livre que l'utilisateur possède.
     */
    public function read(Book $book)
    {
        // On vérifie que l'utilisateur a bien acheté ce livre.
        abort_unless($this->purchasedBookIds()->contains($book->id), 403);
        abort_unless((bool) $book->pdf, 404);

        return view('lecture', ['book' => $book]);
    }

    /**
     * Les ids des livres présents dans les commandes payées de l'utilisateur.
     */
    private function purchasedBookIds(): \Illuminate\Support\Collection
    {
        return OrderItem::query()
            ->whereHas('order', function ($query) {
                $query->where('user_id', Auth::id())
                    ->where('status', 'paid');
            })
            ->pluck('book_id')
            ->unique()
            ->values();
    }
}
