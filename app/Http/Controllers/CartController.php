<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{   
    private const SHIPPING = 0.00;

    public function index()
    {
        $cart = $this->cart();

        $books = Book::whereKey(array_keys($cart))->get();

        $items = $books->map(function (Book $book) use ($cart) {
            $quantity = $cart[$book->id];
            $price = (float) $book->price;

            return [
                'book'     => $book,
                'quantity' => $quantity,
                'price'    => $price,
                'total'    => $price * $quantity,
            ];
        });

        $subtotal = $items->sum('total');
        $shipping = $items->isEmpty() ? 0 : self::SHIPPING;
        $total = $subtotal + $shipping;

        return view('cart', [
            'items'    => $items,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total'    => $total,
        ]);
    }

    public function add(Book $book)
    {
        $cart = $this->cart();
        $cart[$book->id] = ($cart[$book->id] ?? 0) + 1;
        $this->save($cart);

        return back()->with('cart_message', "« {$book->title} » a été ajouté au panier.");
    }

    public function update(Request $request, Book $book)
    {
        $cart = $this->cart();

        if (! isset($cart[$book->id])) {
            return back();
        }

        $action = $request->input('action');

        if ($action === 'increase') {
            $cart[$book->id]++;
        } elseif ($action === 'decrease') {
            $cart[$book->id]--;
        }

        if ($cart[$book->id] <= 0) {
            unset($cart[$book->id]);
        }

        $this->save($cart);
        return back();
    }

    public function remove(Book $book)
    {
        $cart = $this->cart();
        unset($cart[$book->id]);
        $this->save($cart);

        return back()->with('cart_message', "« {$book->title} » a été retiré du panier.");
    }

    private function cart(): array
    {
        return session()->get('cart', []);
    }

    private function save(array $cart): void
    {
        session()->put('cart', $cart);
    }
}
