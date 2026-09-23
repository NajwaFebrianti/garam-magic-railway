@extends('layouts.admin')
@section('title', 'Detail Pesanan')

@section('content')
<a href="{{ route('admin.orders.index') }}" class="text-mystic-400 text-sm hover:text-gold-400">← Kembali ke daftar pesanan</a>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-4">
    <div class="lg:col-span-2 bg-mystic-900/60 border border-gold-500/20 rounded-xl p-6">
        <h2 class="text-gold-400 font-semibold mb-4">Pesanan {{ $order->order_number }}</h2>
        <table class="w-full text-sm mb-4">
            <thead>
                <tr class="text-left text-mystic-400 border-b border-mystic-700">
                    <th class="pb-2">Produk</th>
                    <th class="pb-2">Harga</th>
                    <th class="pb-2">Qty</th>
                    <th class="pb-2 text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr class="border-b border-mystic-800/60">
                        <td class="py-2 text-mystic-100">{{ $item->product_name }}</td>
                        <td class="py-2 text-mystic-300">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="py-2 text-mystic-300">{{ $item->qty }}</td>
                        <td class="py-2 text-right text-mystic-100">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-end">
            <div class="text-right">
                <p class="text-mystic-400 text-sm">Total</p>
                <p class="text-gold-400 text-xl font-semibold">{{ $order->formatted_total }}</p>
            </div>
        </div>

        @if ($order->notes)
            <div class="mt-4 pt-4 border-t border-mystic-700">
                <p class="text-mystic-400 text-sm mb-1">Catatan Pelanggan</p>
                <p class="text-mystic-200 text-sm">{{ $order->notes }}</p>
            </div>
        @endif
    </div>

    <div class="space-y-6">
        <div class="bg-mystic-900/60 border border-gold-500/20 rounded-xl p-6">
            <h3 class="text-gold-400 font-semibold mb-3">Data Pelanggan</h3>
            <p class="text-mystic-100 text-sm font-medium">{{ $order->customer->name }}</p>
            <p class="text-mystic-300 text-sm">{{ $order->customer->whatsapp }}</p>
            <p class="text-mystic-300 text-sm mt-2">{{ $order->customer->full_address }}</p>
        </div>

        <div class="bg-mystic-900/60 border border-gold-500/20 rounded-xl p-6">
            <h3 class="text-gold-400 font-semibold mb-3">Pembayaran</h3>
            <p class="text-mystic-300 text-sm mb-1">Metode: <span class="text-mystic-100">{{ $order->payment_method_label }}</span></p>
            <p class="text-mystic-300 text-sm">Dikonfirmasi: <span class="{{ $order->payment_confirmed ? 'text-green-400' : 'text-red-400' }}">{{ $order->payment_confirmed ? 'Ya' : 'Belum' }}</span></p>
        </div>

        <div class="bg-mystic-900/60 border border-gold-500/20 rounded-xl p-6">
            <h3 class="text-gold-400 font-semibold mb-3">Ubah Status Pesanan</h3>
            <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="flex gap-2">
                @csrf
                @method('PATCH')
                <select name="status" class="flex-1 bg-mystic-950 border border-mystic-700 rounded-lg px-3 py-2 text-sm text-mystic-100">
                    @foreach (['pending'=>'Menunggu Konfirmasi','diproses'=>'Diproses','dikirim'=>'Dikirim','selesai'=>'Selesai','dibatalkan'=>'Dibatalkan'] as $val => $label)
                        <option value="{{ $val }}" @selected($order->status === $val)>{{ $label }}</option>
                    @endforeach
                </select>
                <button class="bg-gold-500 hover:bg-gold-400 text-mystic-950 font-semibold text-sm px-4 py-2 rounded-lg">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
