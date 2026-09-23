@extends('layouts.app')
@section('title', 'Checkout — GARAM MAGIC')

@section('content')
<section class="py-16 px-4">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-10">
            <p class="text-gold-400 text-xs tracking-[0.3em] uppercase mb-2">Checkout</p>
            <h1 class="font-mystic text-3xl md:text-4xl text-mystic-100">Selesaikan Pesanan Anda</h1>
        </div>

        <form action="{{ route('checkout.store') }}" method="POST"
              x-data="{ method: '{{ old('payment_method', '') }}', confirmed: {{ old('payment_confirmation') ? 'true' : 'false' }} }"
              class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @csrf

            {{-- KIRI: FORM DATA --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- DATA DIRI --}}
                <div class="bg-mystic-900/50 border border-gold-500/10 rounded-2xl p-6">
                    <h2 class="text-gold-400 font-semibold mb-4">1. Data Diri & Alamat Pengiriman</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="sm:col-span-2">
                            <label class="block text-sm text-mystic-300 mb-1">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}" required class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100 focus:outline-none focus:border-gold-400">
                            @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-sm text-mystic-300 mb-1">No. WhatsApp</label>
                            <input type="text" name="whatsapp" value="{{ old('whatsapp') }}" required placeholder="08xxxxxxxxxx" class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100 focus:outline-none focus:border-gold-400">
                            @error('whatsapp') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm text-mystic-300 mb-1">Provinsi</label>
                            <input type="text" name="province" value="{{ old('province') }}" required class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100 focus:outline-none focus:border-gold-400">
                            @error('province') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm text-mystic-300 mb-1">Kota / Kabupaten</label>
                            <input type="text" name="city" value="{{ old('city') }}" required class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100 focus:outline-none focus:border-gold-400">
                            @error('city') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm text-mystic-300 mb-1">Kecamatan</label>
                            <input type="text" name="district" value="{{ old('district') }}" required class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100 focus:outline-none focus:border-gold-400">
                            @error('district') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm text-mystic-300 mb-1">Kode Pos</label>
                            <input type="text" name="postal_code" value="{{ old('postal_code') }}" required class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100 focus:outline-none focus:border-gold-400">
                            @error('postal_code') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-sm text-mystic-300 mb-1">Nama Jalan</label>
                            <input type="text" name="street_name" value="{{ old('street_name') }}" required class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100 focus:outline-none focus:border-gold-400">
                            @error('street_name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm text-mystic-300 mb-1">Nama Gedung / Perumahan (opsional)</label>
                            <input type="text" name="building" value="{{ old('building') }}" class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100 focus:outline-none focus:border-gold-400">
                        </div>

                        <div>
                            <label class="block text-sm text-mystic-300 mb-1">No. Rumah (opsional)</label>
                            <input type="text" name="house_number" value="{{ old('house_number') }}" class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100 focus:outline-none focus:border-gold-400">
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-sm text-mystic-300 mb-1">Catatan Tambahan (opsional)</label>
                            <textarea name="notes" rows="2" class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100 focus:outline-none focus:border-gold-400">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- METODE PEMBAYARAN --}}
                <div class="bg-mystic-900/50 border border-gold-500/10 rounded-2xl p-6">
                    <h2 class="text-gold-400 font-semibold mb-4">2. Metode Pembayaran</h2>

                    @error('payment_method') <p class="text-red-400 text-xs mb-3">{{ $message }}</p> @enderror

                    <div class="space-y-3">
                        <label class="flex items-center gap-3 bg-mystic-950/60 border border-mystic-700 rounded-lg px-4 py-3 cursor-pointer hover:border-gold-500/40" :class="method === 'qris' ? 'border-gold-400' : ''">
                            <input type="radio" name="payment_method" value="qris" x-model="method" class="accent-gold-500">
                            <span>📱</span>
                            <div class="flex-1">
                                <p class="text-mystic-100 text-sm font-medium">QRIS</p>
                                <p class="text-mystic-400 text-xs">Scan QRIS untuk pembayaran instan (placeholder demo)</p>
                            </div>
                        </label>

                        <label class="flex items-center gap-3 bg-mystic-950/60 border border-mystic-700 rounded-lg px-4 py-3 cursor-pointer hover:border-gold-500/40" :class="method === 'transfer_bca' ? 'border-gold-400' : ''">
                            <input type="radio" name="payment_method" value="transfer_bca" x-model="method" class="accent-gold-500">
                            <span>🏦</span>
                            <div class="flex-1">
                                <p class="text-mystic-100 text-sm font-medium">Transfer Bank BCA</p>
                                <p class="text-mystic-400 text-xs">a.n. PT Garam Magic — No. Rek: 1234567890</p>
                            </div>
                        </label>

                        <label class="flex items-center gap-3 bg-mystic-950/60 border border-mystic-700 rounded-lg px-4 py-3 cursor-pointer hover:border-gold-500/40" :class="method === 'transfer_mandiri' ? 'border-gold-400' : ''">
                            <input type="radio" name="payment_method" value="transfer_mandiri" x-model="method" class="accent-gold-500">
                            <span>🏦</span>
                            <div class="flex-1">
                                <p class="text-mystic-100 text-sm font-medium">Transfer Bank Mandiri</p>
                                <p class="text-mystic-400 text-xs">a.n. PT Garam Magic — No. Rek: 0987654321</p>
                            </div>
                        </label>

                        <label class="flex items-center gap-3 bg-mystic-950/60 border border-mystic-700 rounded-lg px-4 py-3 cursor-pointer hover:border-gold-500/40" :class="method === 'transfer_bni' ? 'border-gold-400' : ''">
                            <input type="radio" name="payment_method" value="transfer_bni" x-model="method" class="accent-gold-500">
                            <span>🏦</span>
                            <div class="flex-1">
                                <p class="text-mystic-100 text-sm font-medium">Transfer Bank BNI</p>
                                <p class="text-mystic-400 text-xs">a.n. PT Garam Magic — No. Rek: 1122334455</p>
                            </div>
                        </label>

                        <label class="flex items-center gap-3 bg-mystic-950/60 border border-mystic-700 rounded-lg px-4 py-3 cursor-pointer hover:border-gold-500/40" :class="method === 'ewallet' ? 'border-gold-400' : ''">
                            <input type="radio" name="payment_method" value="ewallet" x-model="method" class="accent-gold-500">
                            <span>💳</span>
                            <div class="flex-1">
                                <p class="text-mystic-100 text-sm font-medium">E-Wallet (OVO / GoPay / DANA)</p>
                                <p class="text-mystic-400 text-xs">Simulasi — integrasi Xendit/Midtrans di masa mendatang</p>
                            </div>
                        </label>
                    </div>

                    <label class="flex items-start gap-3 mt-5 bg-gold-500/5 border border-gold-500/20 rounded-lg px-4 py-3 cursor-pointer">
                        <input type="checkbox" name="payment_confirmation" value="1" x-model="confirmed" class="mt-1 accent-gold-500">
                        <span class="text-mystic-200 text-sm">Saya telah membaca dan memahami metode pembayaran yang dipilih, serta akan melakukan pembayaran sesuai instruksi di atas.</span>
                    </label>
                    @error('payment_confirmation') <p class="text-red-400 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- KANAN: RINGKASAN --}}
            <div class="lg:col-span-1">
                <div class="bg-mystic-900/60 border border-gold-500/20 rounded-2xl p-6 glow-card sticky top-24">
                    <h2 class="text-gold-400 font-semibold mb-4">Ringkasan Pesanan</h2>

                    <div class="space-y-3 mb-4">
                        @foreach ($items as $item)
                            <div class="flex justify-between text-sm">
                                <span class="text-mystic-300">{{ $item['product']->name }} x{{ $item['qty'] }}</span>
                                <span class="text-mystic-100">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="border-t border-mystic-700 pt-4 mb-6 flex justify-between">
                        <span class="text-mystic-200">Total</span>
                        <span class="text-gold-400 text-xl font-semibold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>

                    <button type="submit"
                            :disabled="!method || !confirmed"
                            :class="(!method || !confirmed) ? 'opacity-40 cursor-not-allowed' : 'hover:shadow-lg hover:shadow-gold-500/30'"
                            class="w-full bg-gradient-to-r from-gold-500 to-gold-600 text-mystic-950 font-semibold py-3 rounded-full transition">
                        Konfirmasi Pesanan
                    </button>
                    <p class="text-mystic-500 text-xs text-center mt-3">Tombol aktif setelah metode pembayaran dipilih & konfirmasi dicentang.</p>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
