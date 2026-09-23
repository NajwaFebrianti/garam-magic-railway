@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="bg-mystic-900/60 border border-gold-500/20 rounded-xl p-5">
        <p class="text-mystic-400 text-xs mb-1">Total Pesanan</p>
        <p class="text-2xl font-semibold text-gold-400">{{ $stats['total_orders'] }}</p>
    </div>
    <div class="bg-mystic-900/60 border border-gold-500/20 rounded-xl p-5">
        <p class="text-mystic-400 text-xs mb-1">Menunggu Konfirmasi</p>
        <p class="text-2xl font-semibold text-gold-400">{{ $stats['pending_orders'] }}</p>
    </div>
    <div class="bg-mystic-900/60 border border-gold-500/20 rounded-xl p-5">
        <p class="text-mystic-400 text-xs mb-1">Total Pelanggan</p>
        <p class="text-2xl font-semibold text-gold-400">{{ $stats['total_customers'] }}</p>
    </div>
    <div class="bg-mystic-900/60 border border-gold-500/20 rounded-xl p-5">
        <p class="text-mystic-400 text-xs mb-1">Total Pendapatan</p>
        <p class="text-2xl font-semibold text-gold-400">Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}</p>
    </div>
</div>

<div class="bg-mystic-900/60 border border-gold-500/20 rounded-xl p-6">
    <h2 class="text-gold-400 font-semibold mb-4">Pesanan Terbaru</h2>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-mystic-400 border-b border-mystic-700">
                    <th class="pb-2">No. Pesanan</th>
                    <th class="pb-2">Pelanggan</th>
                    <th class="pb-2">Total</th>
                    <th class="pb-2">Status</th>
                    <th class="pb-2"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentOrders as $order)
                    <tr class="border-b border-mystic-800/60">
                        <td class="py-3 text-mystic-100">{{ $order->order_number }}</td>
                        <td class="py-3 text-mystic-300">{{ $order->customer->name ?? '-' }}</td>
                        <td class="py-3 text-mystic-300">{{ $order->formatted_total }}</td>
                        <td class="py-3"><span class="text-xs bg-mystic-700 text-gold-400 px-2 py-1 rounded-full">{{ $order->status_label }}</span></td>
                        <td class="py-3"><a href="{{ route('admin.orders.show', $order) }}" class="text-gold-400 hover:underline">Lihat</a></td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="py-6 text-center text-mystic-400">Belum ada pesanan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
