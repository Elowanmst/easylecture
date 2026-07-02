<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;

class CartController extends Controller
{
    private const SHIPPING = 0.00;

    public function index()
    {
        ['items' => $items, 'subtotal' => $subtotal, 'shipping' => $shipping, 'total' => $total] = $this->summary();

        return view('cart', [
            'items' => $items,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total' => $total,
        ]);
    }

    public function checkout()
    {
        $summary = $this->summary();

        if ($summary['items']->isEmpty()) {
            return redirect()->route('cart.index');
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = StripeSession::create([
            'mode' => 'payment',
            'line_items' => [[
                'quantity' => 1,
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => (int) round($summary['total'] * 100),
                    'product_data' => [
                        'name' => 'Commande EasyLecture',
                    ],
                ],
            ]],
            'success_url' => route('cart.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('cart.index'),
        ]);

        $this->storePendingOrder($summary, $session->id);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');

        if ($sessionId) {
            Order::where('stripe_session_id', $sessionId)
                ->where('status', 'pending')
                ->update(['status' => 'paid']);
        }

        session()->forget('cart');

        return redirect()->route('cart.index')
            ->with('cart_message', 'Merci ! Votre paiement a bien été reçu.');
    }

    private function storePendingOrder(array $summary, string $stripeSessionId): void
    {
        $order = Order::create([
            'user_id'           => Auth::id(),
            'stripe_session_id' => $stripeSessionId,
            'status'            => 'pending',
            'total'             => $summary['total'],
        ]);

        foreach ($summary['items'] as $item) {
            /** @var Book $book */
            $book = $item['book'];

            $order->items()->create([
                'book_id'  => $book->id,
                'title'    => $book->title,
                'price'    => $item['price'],
                'quantity' => $item['quantity'],
            ]);
        }
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

    private function summary(): array
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

        return [
            'items'    => $items,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total'    => $subtotal + $shipping,
        ];
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
