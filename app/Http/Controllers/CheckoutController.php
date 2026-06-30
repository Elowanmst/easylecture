<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CartController;

class CheckoutController extends Controller
{
    protected CartController $cart;

    public function __construct(CartController $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        // On récupère exactement les mêmes données que le panier
        $summary = $this->cartSummary();

        // si panier vide → retour boutique
        if (empty($summary['items']) || count($summary['items']) === 0) {
            return redirect()->route('cart.index');
        }

        return view('checkout.index', [
            'items'    => $summary['items'],
            'subtotal' => $summary['subtotal'],
            'shipping' => $summary['shipping'],
            'total'    => $summary['total'],
        ]);
    }

    /**
     * Réutilise directement la logique du CartController
     */
    private function cartSummary(): array
    {
        // hack propre : on réutilise la méthode privée via réflexion simple
        // (ou on pourrait déplacer summary dans un service plus tard)

        return (new \ReflectionClass($this->cart))
            ->getMethod('summary')
            ->invoke($this->cart);
    }

    /**
     * Redirection vers Stripe (ton CartController gère déjà tout)
     */
    public function pay()
    {
        return redirect()->route('cart.checkout');
    }
}