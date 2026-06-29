<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        // ===== PAGES ADMIN =====

    public function adminIndex()
    {
        $books = Book::paginate(15);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string',
            'age_range' => 'required|string',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:20480',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
            $validated['image'] = $imagePath;
        }

        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('books/pdf', 'public');
            $validated['pdf'] = $pdfPath;
        }

        Book::create($validated);

        return redirect()->route('admin.books.index')->with('success', 'Livre créé avec succès!');
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string',
            'age_range' => 'required|string',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($book->image) {
                \Storage::disk('public')->delete($book->image);
            }
            $imagePath = $request->file('image')->store('books', 'public');
            $validated['image'] = $imagePath;
        }

        $book->update($validated);

        return redirect()->route('admin.books.index')->with('success', 'Livre modifié avec succès!');
    }

    public function destroy(Book $book)
    {
        if ($book->image) {
            \Storage::disk('public')->delete($book->image);
        }

        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Livre supprimé avec succès!');
    }


}