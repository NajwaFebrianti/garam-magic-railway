@extends('layouts.app')
@section('title', 'FAQ — GARAM MAGIC')

@section('content')
<section class="py-20 px-4">
    <div class="max-w-3xl mx-auto text-center mb-14">
        <p class="text-gold-400 text-xs tracking-[0.3em] uppercase mb-2">FAQ</p>
        <h1 class="font-mystic text-3xl md:text-4xl text-mystic-100">Pertanyaan Yang Sering Diajukan</h1>
    </div>

    <div class="max-w-3xl mx-auto space-y-4" x-data="{ open: null }">
        @php
            $faqs = [
                ['q' => 'Berapa lama satu kemasan garam bisa digunakan?', 'a' => 'Satu kemasan Garam AURA atau HOKI umumnya cukup untuk beberapa kali pemakaian, tergantung frekuensi mandi yang Anda lakukan.'],
                ['q' => 'Apakah boleh menggunakan Garam AURA dan HOKI secara bersamaan?', 'a' => 'Boleh, namun kami sarankan untuk fokus pada satu tujuan energi dalam satu waktu mandi agar niat lebih terarah.'],
                ['q' => 'Apakah produk ini aman untuk kulit?', 'a' => 'Garam kami menggunakan bahan alami. Namun jika Anda memiliki kulit sensitif atau luka terbuka, sebaiknya konsultasikan dahulu sebelum penggunaan.'],
                ['q' => 'Berapa lama estimasi pengiriman?', 'a' => 'Estimasi pengiriman 2-5 hari kerja tergantung lokasi tujuan setelah pembayaran dikonfirmasi.'],
                ['q' => 'Apakah GARAM MAGIC pengganti ikhtiar atau pengobatan medis?', 'a' => 'Tidak. Produk kami bersifat pelengkap spiritual dan tidak menggantikan usaha, doa, maupun pengobatan medis profesional.'],
            ];
        @endphp

        @foreach ($faqs as $i => $faq)
            <div class="bg-mystic-900/50 border border-gold-500/10 rounded-xl overflow-hidden">
                <button @click="open = open === {{ $i }} ? null : {{ $i }}" class="w-full flex items-center justify-between px-6 py-4 text-left">
                    <span class="text-mystic-100 font-medium text-sm md:text-base">{{ $faq['q'] }}</span>
                    <span class="text-gold-400" x-text="open === {{ $i }} ? '−' : '+'"></span>
                </button>
                <div x-show="open === {{ $i }}" x-collapse class="px-6 pb-4 text-mystic-300 text-sm leading-relaxed">
                    {{ $faq['a'] }}
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
