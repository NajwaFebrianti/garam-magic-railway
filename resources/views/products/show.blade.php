@extends('layouts.app')
@section('title', $product->name . ' — GARAM MAGIC')

@section('content')
<section class="py-16 px-4">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
        <div class="glow-card bg-mystic-900/60 border border-gold-500/20 rounded-2xl p-12 flex items-center justify-center">
            <span class="text-9xl">{{ $product->slug === 'garam-aura' ? '💜' : '💰' }}</span>
        </div>

        <div>
            <p class="text-gold-400 text-xs tracking-[0.3em] uppercase mb-2">{{ $product->tagline }}</p>
            <h1 class="font-mystic text-3xl md:text-4xl text-mystic-100 mb-4">{{ $product->name }}</h1>
            <p class="text-gold-400 text-2xl font-semibold mb-6">{{ $product->formatted_price }}</p>

            <p class="text-mystic-200 leading-relaxed mb-6 text-sm md:text-base">{{ $product->description }}</p>

            @if ($product->benefits)
                <div class="mb-8">
                    <h3 class="text-mystic-100 font-semibold mb-3">Manfaat Utama:</h3>
                    <ul class="space-y-2 text-mystic-300 text-sm">
                        @foreach (explode("\n", $product->benefits) as $b)
                            <li class="flex items-start gap-2"><span class="text-gold-400">✦</span> {{ $b }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex items-center gap-4">
                @csrf
                <input type="number" name="qty" value="1" min="1" class="w-20 bg-mystic-900 border border-gold-500/30 rounded-lg px-3 py-2 text-center text-mystic-100 focus:outline-none focus:border-gold-400">
                <button class="flex-1 bg-gradient-to-r from-gold-500 to-gold-600 text-mystic-950 font-semibold px-6 py-3 rounded-full hover:shadow-lg hover:shadow-gold-500/30 transition">
                    Tambah ke Keranjang
                </button>
            </form>

            <a href="{{ route('education') }}" class="inline-block mt-6 text-sm text-mystic-300 underline hover:text-gold-400">📖 Lihat tata cara mandi yang benar</a>
        </div>
    </div>

    @if ($others->isNotEmpty())
        <div class="max-w-5xl mx-auto mt-20">
            <h2 class="font-mystic text-2xl text-mystic-100 mb-6 text-center">Produk Lainnya</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($others as $o)
                    <a href="{{ route('products.show', $o->slug) }}" class="bg-mystic-900/50 border border-gold-500/10 rounded-xl p-6 flex items-center gap-4 hover:border-gold-500/40 transition">
                        <span class="text-3xl">{{ $o->slug === 'garam-aura' ? '💜' : '💰' }}</span>
                        <div>
                            <h4 class="text-gold-400 font-semibold">{{ $o->name }}</h4>
                            <p class="text-mystic-300 text-sm">{{ $o->formatted_price }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</section>
@endsection
