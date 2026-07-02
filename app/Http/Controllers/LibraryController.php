<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index()
    {
        $books = Book::whereIn('id', $this->purchasedBookIds())
            ->orderBy('title', 'asc')
            ->get();

        return view('mes-livres', ['books' => $books]);
    }

    public function read(Book $book)
    {
        abort_unless($this->purchasedBookIds()->contains($book->id), 403);
        abort_unless((bool) $book->pdf, 404);

        return view('lecture', ['book' => $book]);
    }

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
