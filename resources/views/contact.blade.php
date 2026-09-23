@extends('layouts.app')
@section('title', 'Kontak — GARAM MAGIC')

@section('content')
<section class="py-20 px-4">
    <div class="max-w-3xl mx-auto text-center mb-14">
        <p class="text-gold-400 text-xs tracking-[0.3em] uppercase mb-2">Hubungi Kami</p>
        <h1 class="font-mystic text-3xl md:text-4xl text-mystic-100">Ada Pertanyaan?</h1>
        <p class="text-mystic-300 mt-4 text-sm md:text-base">Tim GARAM MAGIC siap membantu Anda.</p>
    </div>

    <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">
        <div class="space-y-6">
            <div class="bg-mystic-900/50 border border-gold-500/10 rounded-xl p-6 flex items-center gap-4">
                <span class="text-2xl">📱</span>
                <div>
                    <p class="text-mystic-100 font-medium">WhatsApp</p>
                    <p class="text-mystic-300 text-sm">0812-xxxx-xxxx</p>
                </div>
            </div>
            <div class="bg-mystic-900/50 border border-gold-500/10 rounded-xl p-6 flex items-center gap-4">
                <span class="text-2xl">📧</span>
                <div>
                    <p class="text-mystic-100 font-medium">Email</p>
                    <p class="text-mystic-300 text-sm">halo@garammagic.com</p>
                </div>
            </div>
            <div class="bg-mystic-900/50 border border-gold-500/10 rounded-xl p-6 flex items-center gap-4">
                <span class="text-2xl">🏢</span>
                <div>
                    <p class="text-mystic-100 font-medium">Perusahaan</p>
                    <p class="text-mystic-300 text-sm">PT Garam Magic Indonesia</p>
                </div>
            </div>
        </div>

        <form action="{{ route('contact.store') }}" method="POST" class="bg-mystic-900/60 border border-gold-500/20 rounded-2xl p-6 space-y-4 glow-card">
            @csrf
            <div>
                <label class="block text-sm text-mystic-300 mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100 focus:outline-none focus:border-gold-400">
                @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm text-mystic-300 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100 focus:outline-none focus:border-gold-400">
                @error('email') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm text-mystic-300 mb-1">No. WhatsApp (opsional)</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100 focus:outline-none focus:border-gold-400">
            </div>
            <div>
                <label class="block text-sm text-mystic-300 mb-1">Pesan</label>
                <textarea name="message" rows="4" class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100 focus:outline-none focus:border-gold-400">{{ old('message') }}</textarea>
                @error('message') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <button class="w-full bg-gradient-to-r from-gold-500 to-gold-600 text-mystic-950 font-semibold py-3 rounded-full hover:shadow-lg hover:shadow-gold-500/30 transition">Kirim Pesan</button>
        </form>
    </div>
</section>
@endsection
