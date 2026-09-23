@extends('layouts.app')
@section('title', 'Pesanan Berhasil — GARAM MAGIC')

@section('content')
<section class="py-20 px-4">
    <div class="max-w-2xl mx-auto text-center mb-10">
        <div class="text-6xl mb-4">✨🔮✨</div>
        <h1 class="font-mystic text-3xl md:text-4xl text-gold-400 mb-3">Pesanan Berhasil Dibuat!</h1>
        <p class="text-mystic-300">Nomor Pesanan: <span class="text-mystic-100 font-semibold">{{ $order->order_number }}</span></p>
    </div>

    <div class="max-w-2xl mx-auto bg-mystic-900/60 border border-gold-500/20 rounded-2xl p-6 glow-card">
        <h3 class="text-gold-400 font-semibold mb-4">Detail Pesanan</h3>
        <div class="space-y-3 mb-4">
            @foreach ($order->items as $item)
                <div class="flex justify-between text-sm">
                    <span class="text-mystic-300">{{ $item->product_name }} x{{ $item->qty }}</span>
                    <span class="text-mystic-100">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                </div>
            @endforeach
        </div>
        <div class="border-t border-mystic-700 pt-4 mb-6 flex justify-between">
            <span class="text-mystic-200">Total</span>
            <span class="text-gold-400 text-xl font-semibold">{{ $order->formatted_total }}</span>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm mb-2">
            <div>
                <p class="text-mystic-400">Metode Pembayaran</p>
                <p class="text-mystic-100">{{ $order->payment_method_label }}</p>
            </div>
            <div>
                <p class="text-mystic-400">Status</p>
                <p class="text-gold-400">{{ $order->status_label }}</p>
            </div>
        </div>
        <div class="mt-4">
            <p class="text-mystic-400 text-sm">Dikirim ke</p>
            <p class="text-mystic-100 text-sm">{{ $order->customer->name }} — {{ $order->customer->whatsapp }}</p>
            <p class="text-mystic-300 text-sm">{{ $order->customer->full_address }}</p>
        </div>
    </div>

    <div class="text-center mt-8">
        <a href="{{ route('products.index') }}" class="inline-block bg-gold-500 hover:bg-gold-400 text-mystic-950 font-semibold px-8 py-3 rounded-full transition">Belanja Lagi</a>
    </div>
</section>
@endsection
