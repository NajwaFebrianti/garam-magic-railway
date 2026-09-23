@extends('layouts.app')
@section('title', 'Produk — GARAM MAGIC')

@section('content')
<section class="py-20 px-4">
    <div class="max-w-4xl mx-auto text-center mb-14">
        <p class="text-gold-400 text-xs tracking-[0.3em] uppercase mb-2">Katalog</p>
        <h1 class="font-mystic text-3xl md:text-4xl text-mystic-100">Semua Produk GARAM MAGIC</h1>
        <p class="text-mystic-300 mt-4 text-sm md:text-base">Pilih energi yang sesuai dengan kebutuhan Anda</p>
    </div>

    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach ($products as $product)
            <div class="glow-card bg-mystic-900/60 border border-gold-500/20 rounded-2xl p-8 flex flex-col">
                <div class="text-5xl mb-4">{{ $product->slug === 'garam-aura' ? '💜' : '💰' }}</div>
                <h3 class="font-mystic text-2xl text-gold-400 mb-1">{{ $product->name }}</h3>
                <p class="text-sm text-mystic-300 mb-4">{{ $product->tagline }}</p>
                <p class="text-mystic-200 text-sm leading-relaxed mb-6 flex-1">{{ $product->description }}</p>

                @if ($product->benefits)
                    <ul class="text-mystic-300 text-sm space-y-1 mb-6">
                        @foreach (explode("\n", $product->benefits) as $b)
                            <li class="flex items-start gap-2"><span class="text-gold-400">✦</span> {{ $b }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="flex items-center justify-between mt-auto">
                    <span class="text-gold-400 font-semibold text-lg">{{ $product->formatted_price }}</span>
                    <div class="flex gap-2">
                        <a href="{{ route('products.show', $product->slug) }}" class="border border-gold-500/40 text-gold-400 text-sm px-4 py-2 rounded-full hover:bg-mystic-800 transition">Detail</a>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="qty" value="1">
                            <button class="bg-mystic-700 hover:bg-mystic-600 text-white text-sm px-4 py-2 rounded-full transition">+ Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
