@extends('layouts.app')
@section('title', 'Tata Cara Mandi Air Garam — GARAM MAGIC')

@section('content')
<section class="py-20 px-4">
    <div class="max-w-3xl mx-auto text-center mb-14">
        <p class="text-gold-400 text-xs tracking-[0.3em] uppercase mb-2">Panduan Ritual</p>
        <h1 class="font-mystic text-3xl md:text-4xl text-mystic-100">Tata Cara Mandi Garam yang Benar</h1>
        <p class="text-mystic-300 mt-4 text-sm md:text-base">Ikuti langkah-langkah berikut agar ritual mandi garam Anda berjalan dengan khusyuk dan maksimal.</p>
    </div>

    <div class="max-w-3xl mx-auto space-y-6">

        <div class="bg-mystic-900/50 border border-gold-500/10 rounded-xl p-6 flex gap-5">
            <div class="text-3xl">🕐</div>
            <div>
                <h3 class="text-gold-400 font-semibold mb-2">1. Waktu Mandi</h3>
                <p class="text-mystic-300 text-sm leading-relaxed">Waktu yang paling dianjurkan adalah <strong class="text-mystic-100">sebelum waktu subuh</strong> (sepertiga malam terakhir) atau <strong class="text-mystic-100">sebelum waktu maghrib</strong>. Kedua waktu ini dipercaya sebagai momen pergantian energi yang paling baik untuk membersihkan diri.</p>
            </div>
        </div>

        <div class="bg-mystic-900/50 border border-gold-500/10 rounded-xl p-6 flex gap-5">
            <div class="text-3xl">🙏</div>
            <div>
                <h3 class="text-gold-400 font-semibold mb-2">2. Niat Sebelum Mandi</h3>
                <p class="text-mystic-300 text-sm leading-relaxed mb-3">Sebelum memulai, tenangkan pikiran terlebih dahulu. Niatkan dalam hati dengan penuh keyakinan, misalnya:</p>
                <div class="bg-mystic-950/60 border border-gold-500/20 rounded-lg p-4 text-mystic-200 text-sm italic">
                    "Dengan niat yang tulus, aku membersihkan diriku dari segala energi negatif yang menempel pada tubuh dan pikiranku, serta membuka diri pada energi positif, ketenangan, dan kebaikan."
                </div>
                <p class="text-mystic-400 text-xs mt-3">*Niat dapat disesuaikan dengan keyakinan dan bahasa masing-masing individu, yang terpenting adalah ketulusan hati.</p>
            </div>
        </div>

        <div class="bg-mystic-900/50 border border-gold-500/10 rounded-xl p-6 flex gap-5">
            <div class="text-3xl">💧</div>
            <div>
                <h3 class="text-gold-400 font-semibold mb-2">3. Persiapan Air Garam</h3>
                <p class="text-mystic-300 text-sm leading-relaxed">Larutkan garam GARAM MAGIC ke dalam seember air bersih. Aduk perlahan searah jarum jam sambil menjaga pikiran tetap tenang dan fokus pada niat yang telah ditetapkan.</p>
            </div>
        </div>

        <div class="bg-mystic-900/50 border border-gold-500/10 rounded-xl p-6 flex gap-5">
            <div class="text-3xl">🚿</div>
            <div>
                <h3 class="text-gold-400 font-semibold mb-2">4. Pola Siraman</h3>
                <p class="text-mystic-300 text-sm leading-relaxed mb-3">Siramkan air garam secara berurutan dengan pola berikut:</p>
                <ol class="text-mystic-300 text-sm space-y-2 list-decimal list-inside">
                    <li>Siram <strong class="text-mystic-100">ubun-ubun / puncak kepala</strong> sebanyak 3 kali, biarkan air mengalir ke seluruh tubuh.</li>
                    <li>Lanjutkan siram ke <strong class="text-mystic-100">bahu kanan</strong> sebanyak 3 kali.</li>
                    <li>Lanjutkan siram ke <strong class="text-mystic-100">bahu kiri</strong> sebanyak 3 kali.</li>
                    <li>Siram sisa air ke seluruh tubuh secara merata sambil tetap fokus pada niat.</li>
                </ol>
            </div>
        </div>

        <div class="bg-mystic-900/50 border border-gold-500/10 rounded-xl p-6 flex gap-5">
            <div class="text-3xl">🕯️</div>
            <div>
                <h3 class="text-gold-400 font-semibold mb-2">5. Setelah Mandi</h3>
                <p class="text-mystic-300 text-sm leading-relaxed">Biarkan tubuh mengering secara alami tanpa dibilas ulang. Setelah itu, luangkan waktu sejenak untuk duduk tenang, tarik napas dalam-dalam, dan rasakan ketenangan yang muncul. Lakukan ritual ini secara rutin untuk hasil yang lebih optimal.</p>
            </div>
        </div>

        <div class="bg-gold-500/10 border border-gold-500/30 rounded-xl p-6 text-center">
            <p class="text-mystic-200 text-sm">⚠️ Ritual ini bersifat spiritual dan merupakan pelengkap ikhtiar, bukan pengganti usaha, doa wajib, maupun pengobatan medis.</p>
        </div>

        <div class="text-center pt-6">
            <a href="{{ route('products.index') }}" class="inline-block bg-gradient-to-r from-gold-500 to-gold-600 text-mystic-950 font-semibold px-8 py-3 rounded-full hover:shadow-lg hover:shadow-gold-500/30 transition">
                Dapatkan Garam MAGIC Anda
            </a>
        </div>
    </div>
</section>
@endsection
