@extends('layouts.admin')
@section('title', 'Detail Pelanggan')

@section('content')
<a href="{{ route('admin.customers.index') }}" class="text-mystic-400 text-sm hover:text-gold-400">← Kembali ke daftar pelanggan</a>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-4">
    <div class="bg-mystic-900/60 border border-gold-500/20 rounded-xl p-6">
        <h3 class="text-gold-400 font-semibold mb-3">{{ $customer->name }}</h3>
        <p class="text-mystic-300 text-sm mb-1">📱 {{ $customer->whatsapp }}</p>
        <p class="text-mystic-300 text-sm">📍 {{ $customer->full_address }}</p>
    </div>

    <div class="lg:col-span-2 bg-mystic-900/60 border border-gold-500/20 rounded-xl p-6">
        <h3 class="text-gold-400 font-semibold mb-4">Riwayat Pesanan</h3>
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-mystic-400 border-b border-mystic-700">
                    <th class="pb-2">No. Pesanan</th>
                    <th class="pb-2">Total</th>
                    <th class="pb-2">Status</th>
                    <th class="pb-2"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customer->orders as $order)
                    <tr class="border-b border-mystic-800/60">
                        <td class="py-2 text-mystic-100">{{ $order->order_number }}</td>
                        <td class="py-2 text-mystic-300">{{ $order->formatted_total }}</td>
                        <td class="py-2"><span class="text-xs bg-mystic-700 text-gold-400 px-2 py-1 rounded-full">{{ $order->status_label }}</span></td>
                        <td class="py-2"><a href="{{ route('admin.orders.show', $order) }}" class="text-gold-400 hover:underline">Lihat</a></td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="py-6 text-center text-mystic-400">Belum ada pesanan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
