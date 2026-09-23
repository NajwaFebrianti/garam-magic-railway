<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda masih kosong.');
        }

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

        return view('checkout.index', compact('items', 'total'));
    }

    public function store(Request $request): RedirectResponse
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda masih kosong.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'street_name' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
            'house_number' => 'nullable|string|max:50',
            'payment_method' => 'required|in:qris,transfer_bca,transfer_mandiri,transfer_bni,ewallet',
            'payment_confirmation' => 'required|accepted',
            'notes' => 'nullable|string|max:1000',
        ], [
            'payment_method.required' => 'Silakan pilih metode pembayaran terlebih dahulu.',
            'payment_confirmation.required' => 'Anda harus mencentang konfirmasi pembayaran.',
            'payment_confirmation.accepted' => 'Anda harus mencentang konfirmasi pembayaran.',
        ]);

        $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');

        if ($products->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda tidak valid.');
        }

        $order = DB::transaction(function () use ($validated, $cart, $products) {
            $customer = Customer::create([
                'name' => $validated['name'],
                'whatsapp' => $validated['whatsapp'],
                'province' => $validated['province'],
                'city' => $validated['city'],
                'district' => $validated['district'],
                'postal_code' => $validated['postal_code'],
                'street_name' => $validated['street_name'],
                'building' => $validated['building'] ?? null,
                'house_number' => $validated['house_number'] ?? null,
            ]);

            $subtotal = 0;
            $itemsData = [];

            foreach ($cart as $productId => $qty) {
                if (! isset($products[$productId])) {
                    continue;
                }
                $product = $products[$productId];
                $lineSubtotal = $product->price * $qty;
                $subtotal += $lineSubtotal;

                $itemsData[] = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'price' => $product->price,
                    'qty' => $qty,
                    'subtotal' => $lineSubtotal,
                ];
            }

            $order = Order::create([
                'order_number' => 'GM-' . strtoupper(Str::random(8)),
                'customer_id' => $customer->id,
                'payment_method' => $validated['payment_method'],
                'payment_confirmed' => true,
                'status' => 'pending',
                'subtotal' => $subtotal,
                'shipping_cost' => 0,
                'total' => $subtotal,
                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($itemsData as $item) {
                OrderItem::create(array_merge($item, ['order_id' => $order->id]));
            }

            return $order;
        });

        session()->forget('cart');
        session(['last_order_number' => $order->order_number]);

        return redirect()->route('checkout.success')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function success()
    {
        $orderNumber = session('last_order_number');

        if (! $orderNumber) {
            return redirect()->route('home');
        }

        $order = Order::with('items', 'customer')->where('order_number', $orderNumber)->firstOrFail();

        return view('checkout.success', compact('order'));
    }
}
