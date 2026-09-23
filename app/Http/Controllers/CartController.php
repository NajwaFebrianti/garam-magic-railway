<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');

        $items = [];
        $total = 0;

        foreach ($cart as $productId => $qty) {
            if (! isset($products[$productId])) {
                continue;
            }
            $product = $products[$productId];
            $subtotal = $product->price * $qty;
            $total += $subtotal;

            $items[] = [
                'product' => $product,
                'qty' => $qty,
                'subtotal' => $subtotal,
            ];
        }

        return view('cart.index', compact('items', 'total'));
    }

    public function add(Request $request, Product $product): RedirectResponse
    {
        $qty = max(1, (int) $request->input('qty', 1));

        $cart = session('cart', []);
        $cart[$product->id] = ($cart[$product->id] ?? 0) + $qty;
        session(['cart' => $cart]);

        return back()->with('success', "{$product->name} berhasil ditambahkan ke keranjang.");
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $qty = (int) $request->input('qty', 1);
        $cart = session('cart', []);

        if ($qty <= 0) {
            unset($cart[$product->id]);
        } else {
            $cart[$product->id] = $qty;
        }

        session(['cart' => $cart]);

        return back()->with('success', 'Keranjang diperbarui.');
    }

    public function remove(Product $product): RedirectResponse
    {
        $cart = session('cart', []);
        unset($cart[$product->id]);
        session(['cart' => $cart]);

        return back()->with('success', 'Produk dihapus dari keranjang.');
    }
}
