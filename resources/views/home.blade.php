@extends('layouts.app')

@section('title', 'GARAM MAGIC — Garam Mandi Metafisik Penetral Energi Negatif')

@section('content')

{{-- HERO --}}
<section class="relative overflow-hidden py-24 md:py-32 text-center px-4">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-10 left-10 w-72 h-72 bg-mystic-500/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-10 w-96 h-96 bg-gold-500/10 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-4xl mx-auto">
        <p class="text-gold-400 tracking-[0.3em] text-xs md:text-sm mb-4 uppercase">Garam Mandi Metafisik</p>
        <h1 class="font-mystic text-4xl md:text-6xl leading-tight text-transparent bg-clip-text bg-gradient-to-r from-gold-400 via-mystic-200 to-gold-400 mb-6">
            GARAM MAGIC ✨
        </h1>
        <p class="text-mystic-200 text-base md:text-lg max-w-2xl mx-auto mb-10 leading-relaxed">
            Netralkan energi negatif, bersihkan aura, dan buka jalan pengasihan serta rezeki Anda
            dengan ritual mandi garam metafisik yang diracik penuh niat baik.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('products.index') }}" class="bg-gradient-to-r from-gold-500 to-gold-600 text-mystic-950 font-semibold px-8 py-3 rounded-full shadow-lg shadow-gold-500/20 hover:shadow-gold-500/40 transition">
                Belanja Sekarang
            </a>
            <a href="{{ route('education') }}" class="border border-gold-500/50 text-gold-400 px-8 py-3 rounded-full hover:bg-mystic-800/50 transition">
                Lihat Tata Cara Mandi
            </a>
        </div>
    </div>
</section>

<div class="sparkle-divider max-w-5xl mx-auto"></div>

{{-- PRODUK --}}
<section class="py-20 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-14">
            <p class="text-gold-400 text-xs tracking-[0.3em] uppercase mb-2">Koleksi Kami</p>
            <h2 class="font-mystic text-3xl md:text-4xl text-mystic-100">Dua Energi, Dua Tujuan</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($products as $product)
                <div class="glow-card bg-mystic-900/60 border border-gold-500/20 rounded-2xl p-8 flex flex-col hover:-translate-y-1 transition">
                    <div class="text-5xl mb-4">{{ $product->slug === 'garam-aura' ? '💜' : '💰' }}</div>
                    <h3 class="font-mystic text-2xl text-gold-400 mb-1">{{ $product->name }}</h3>
                    <p class="text-sm text-mystic-300 mb-4">{{ $product->tagline }}</p>
                    <p class="text-mystic-200 text-sm leading-relaxed mb-6 flex-1">{{ $product->description }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gold-400 font-semibold text-lg">{{ $product->formatted_price }}</span>
                        <a href="{{ route('products.show', $product->slug) }}" class="bg-mystic-700 hover:bg-mystic-600 text-white text-sm px-5 py-2 rounded-full transition">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<div class="sparkle-divider max-w-5xl mx-auto"></div>

{{-- BENEFITS --}}
<section class="py-20 px-4 bg-mystic-950/40">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-14">
            <p class="text-gold-400 text-xs tracking-[0.3em] uppercase mb-2">Kenapa GARAM MAGIC</p>
            <h2 class="font-mystic text-3xl md:text-4xl text-mystic-100">Manfaat Ritual Mandi Garam</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ([
                ['icon' => '🌙', 'title' => 'Netralisir Energi Negatif', 'desc' => 'Membantu membersihkan energi negatif yang menempel di aura tubuh.'],
                ['icon' => '💫', 'title' => 'Pengasihan Alami', 'desc' => 'Memancarkan pesona diri agar orang lain merasa nyaman di dekat Anda.'],
                ['icon' => '💵', 'title' => 'Kelancaran Rezeki', 'desc' => 'Membuka jalan energi keberuntungan untuk finansial dan karir.'],
                ['icon' => '🧘', 'title' => 'Ketenangan Batin', 'desc' => 'Ritual yang membantu menenangkan pikiran dan menyeimbangkan energi.'],
            ] as $benefit)
                <div class="bg-mystic-900/50 border border-gold-500/10 rounded-xl p-6 text-center hover:border-gold-500/40 transition">
                    <div class="text-3xl mb-3">{{ $benefit['icon'] }}</div>
                    <h3 class="text-mystic-100 font-semibold mb-2">{{ $benefit['title'] }}</h3>
                    <p class="text-mystic-300 text-sm leading-relaxed">{{ $benefit['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TESTIMONIALS --}}
<section class="py-20 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-14">
            <p class="text-gold-400 text-xs tracking-[0.3em] uppercase mb-2">Kata Mereka</p>
            <h2 class="font-mystic text-3xl md:text-4xl text-mystic-100">Testimoni Pelanggan</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ([
                ['name' => 'Ayu, Jakarta', 'text' => 'Setelah rutin pakai Garam HOKI, dagangan online saya jadi lebih ramai. Alhamdulillah!', 'product' => 'Garam HOKI✨'],
                ['name' => 'Dimas, Bandung', 'text' => 'Badan dan pikiran terasa lebih ringan setiap habis mandi pakai Garam AURA. Recommended!', 'product' => 'Garam AURA✨'],
                ['name' => 'Sinta, Surabaya', 'text' => 'Pengiriman cepat, packaging rapi dan wangi. Ritualnya juga dijelaskan dengan detail.', 'product' => 'Garam AURA✨ & HOKI✨'],
            ] as $t)
                <div class="bg-mystic-900/50 border border-gold-500/10 rounded-xl p-6">
                    <div class="text-gold-400 mb-3">★★★★★</div>
                    <p class="text-mystic-200 text-sm italic leading-relaxed mb-4">"{{ $t['text'] }}"</p>
                    <p class="text-mystic-100 font-medium text-sm">{{ $t['name'] }}</p>
                    <p class="text-mystic-400 text-xs">Pengguna {{ $t['product'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16 px-4">
    <div class="max-w-4xl mx-auto bg-gradient-to-r from-mystic-800 to-mystic-700 rounded-3xl p-10 md:p-14 text-center border border-gold-500/30 glow-card">
        <h2 class="font-mystic text-2xl md:text-3xl text-gold-400 mb-4">Saatnya Membersihkan Energi Anda</h2>
        <p class="text-mystic-200 mb-8 max-w-xl mx-auto text-sm md:text-base">Mulai ritual mandi garam metafisik Anda hari ini dan rasakan perubahan energi di sekitar Anda.</p>
        <a href="{{ route('products.index') }}" class="inline-block bg-gold-500 hover:bg-gold-400 text-mystic-950 font-semibold px-10 py-3 rounded-full transition">Pesan Sekarang</a>
    </div>
</section>

@endsection
