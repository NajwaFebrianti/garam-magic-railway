@extends('layouts.app')
@section('title', 'Keranjang Belanja — GARAM MAGIC')

@section('content')
<section class="py-16 px-4">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-10">
            <p class="text-gold-400 text-xs tracking-[0.3em] uppercase mb-2">Keranjang</p>
            <h1 class="font-mystic text-3xl md:text-4xl text-mystic-100">Keranjang Belanja Anda</h1>
        </div>

        @if (empty($items))
            <div class="text-center py-16 bg-mystic-900/40 border border-gold-500/10 rounded-2xl">
                <p class="text-5xl mb-4">🛒</p>
                <p class="text-mystic-300 mb-6">Keranjang Anda masih kosong.</p>
                <a href="{{ route('products.index') }}" class="inline-block bg-gold-500 hover:bg-gold-400 text-mystic-950 font-semibold px-6 py-3 rounded-full transition">Mulai Belanja</a>
            </div>
        @else
            <div class="space-y-4 mb-8">
                @foreach ($items as $item)
                    <div class="bg-mystic-900/50 border border-gold-500/10 rounded-xl p-5 flex items-center gap-5">
                        <span class="text-4xl">{{ $item['product']->slug === 'garam-aura' ? '💜' : '💰' }}</span>
                        <div class="flex-1">
                            <h3 class="text-mystic-100 font-semibold">{{ $item['product']->name }}</h3>
                            <p class="text-mystic-400 text-sm">{{ $item['product']->formatted_price }} / pcs</p>
                        </div>

                        <form action="{{ route('cart.update', $item['product']->id) }}" method="POST" class="flex items-center gap-2">
                            @csrf
                            @method('PATCH')
                            <button type="submit" name="qty" value="{{ $item['qty'] - 1 }}" class="w-8 h-8 flex items-center justify-center bg-mystic-800 hover:bg-mystic-700 rounded-full text-gold-400">−</button>
                            <span class="w-8 text-center text-mystic-100">{{ $item['qty'] }}</span>
                            <button type="submit" name="qty" value="{{ $item['qty'] + 1 }}" class="w-8 h-8 flex items-center justify-center bg-mystic-800 hover:bg-mystic-700 rounded-full text-gold-400">+</button>
                        </form>

                        <div class="w-28 text-right text-gold-400 font-semibold">
                            Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
                        </div>

                        <form action="{{ route('cart.remove', $item['product']->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-400 hover:text-red-300 text-lg">🗑️</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="bg-mystic-900/60 border border-gold-500/20 rounded-2xl p-6 glow-card">
                <div class="flex items-center justify-between mb-6">
                    <span class="text-mystic-200">Total Belanja</span>
                    <span class="text-gold-400 text-2xl font-semibold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <a href="{{ route('checkout.index') }}" class="block text-center bg-gradient-to-r from-gold-500 to-gold-600 text-mystic-950 font-semibold py-3 rounded-full hover:shadow-lg hover:shadow-gold-500/30 transition">
                    Lanjut ke Checkout
                </a>
            </div>
        @endif
    </div>
</section>
@endsection
