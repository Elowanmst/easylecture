<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        /** @var Builder<Book> $query */
        $query = Book::query();

        if ($request->filled('genre')) {
            $query->where('genre', $request->input('genre'));
        }

        if ($request->filled('age_range')) {
            $query->where('age_range', $request->input('age_range'));
        }

        switch ($request->input('price')) {
            case 'free':
                $query->where('price', 0);
                break;
            case 'under5':
                $query->where('price', '>', 0)->where('price', '<', 5);
                break;
            case '5to10':
                $query->whereBetween('price', [5, 10]);
                break;
            case '10to20':
                $query->whereBetween('price', [10, 20]);
                break;
        }

        $books = $query->orderBy('title')->get();

        return view('boutique', ['books' => $books]);
    }

    public function show(Book $book)
    {
        return view('product', ['book' => $book]);
    }
}